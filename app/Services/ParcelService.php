<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 13.06.2017
 * Time: 15:59
 */

namespace App\Services;


use App\Events\ParcelProhibitedItemWasCreated;
use App\Repositories\ParcelRepositoryContract;
use App\Repository\ParcelImageRepositoryContract;
use App\Repository\ShippingRequestRepositoryContract;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ParcelService implements ParcelServiceContract
{
    /**
     * Длина произвольного числа XXXX номера посылки
     */
    const LENGTH_NUMBER = 4;

    protected $parcelRepository;
    protected $shippingRequestRepository;
    protected $parcelImageRepository;

    /**
     * ParcelService constructor.
     *
     * @param ParcelRepositoryContract $parcelRepository
     * @param ShippingRequestRepositoryContract $shippingRequestRepository
     * @param ParcelImageRepositoryContract $parcelImageRepository
     */
    public function __construct(ParcelRepositoryContract $parcelRepository, ShippingRequestRepositoryContract $shippingRequestRepository, ParcelImageRepositoryContract $parcelImageRepository)
    {
        $this->parcelRepository = $parcelRepository;
        $this->shippingRequestRepository = $shippingRequestRepository;
        $this->parcelImageRepository = $parcelImageRepository;
    }

    public function registerProhibitedItem($request)
    {
        // получаем некоторые нужные данные с отправления
        $shipping = $this->shippingRequestRepository->findByID($request->shipping_request_id);

        // получаем номер последней посылку за сегодняшнюю дату, который будет использоваться
        // для генерации уникального номера посылки
        $parcelToday = $this->parcelRepository->findForToday();
        $numberToday = (count($parcelToday) > 0) ? $parcelToday->number : 0;

        $data = [
            'client_id' => $shipping->client_id,
            'weight' => $request->weight,
            'tracking_number' => trans('parcel.value_tracking_number'),
            'comment' => str_replace('%shipping_request-number%', $shipping->number, $shipping->shipping_request_type->template),
            'number' => $this->generateNumber($numberToday),
            'bar_code' => $this->generateBarCode($numberToday),
            'status_id' => Status::PROHIBITED,
        ];

        DB::transaction(function () use ($data, $request, &$parcel) {

            $parcel = $this->parcelRepository->store($data);

            if (!empty($request->images)) {
                $i = 0;
                foreach ($request->images as $image) {
                    $images[$i]['filename'] = $image->store('images');
                    $images[$i]['parcel_id'] = $parcel->id;
                    $i++;
                }
            }

            $this->parcelImageRepository->insert($images);

        });

        // вызов событии для отправки email и вызов api printnode
        event(new ParcelProhibitedItemWasCreated($parcel));
    }

    /**
     * Получая старый номер посылки и вырезая последние четыре
     * цифр генерируется новый номер посылки
     *
     * @param $number
     * @return string
     */
    public function generateNumber($number)
    {
        $number = (is_null($number) || empty($number)) ? 0 : (int)$this->parseNumber($number) + 1;
        $number = $this->fill_zero($number);

        return sprintf("p%s-%s", Carbon::now()->format("dym"), $number);
    }

    /**
     * Получая старый номер посылки и вырезая последние четыре
     * цифр генерируется новый штрих код посылки
     *
     * @param $number
     * @return string
     */
    public function generateBarCode($number)
    {
        $number = (is_null($number) || empty($number)) ? 0 : (int)$this->parseNumber($number) + 1;
        $number = $this->fill_zero($number);

        return sprintf("%s%s", Carbon::now()->format("dym"), $number);
    }

    /**
     *
     */
    public function parseNumber($number)
    {
        $num = explode("-", $number);
        return $num[1];
    }

    public function fill_zero($number = 0)
    {
        return str_pad((string)$number, self::LENGTH_NUMBER, "0", STR_PAD_LEFT);
    }
}