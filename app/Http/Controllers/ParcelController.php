<?php

namespace App\Http\Controllers;

use App\Repositories\ParcelRepositoryContract;
use App\Services\ParcelServiceContract;
use Illuminate\Http\Request;

class ParcelController extends Controller
{

    protected $parcelRepository;
    protected $shippingRequestRepository;
    protected $parcelService;
    protected $parcelImageRepository;

    public function __construct(ParcelRepositoryContract $parcelRepository, ParcelServiceContract $parcelService)
    {
        $this->middleware('auth');

        $this->parcelRepository = $parcelRepository;
        $this->parcelService = $parcelService;
    }

    /**
     * Отображение списка посылок
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parcel.index')->withParcels($this->parcelRepository->all());
    }

    /**
     *  Регистрация посылки с запрещенным товаром
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $rules = [
            'shipping_request_id' => 'required|integer',
            'weight' => 'required|numeric',
            "images" => "required|array",
            'images.*' => 'image|mimes:jpeg,bmp,png,svg|between:0,2000',
        ];

        $this->validate($request, $rules);

        $this->parcelService->registerProhibitedItem($request);

        return redirect(route('parcel.index'))->with('flash_message', "Success");

    }


}
