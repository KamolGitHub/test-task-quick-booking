<?php

namespace App\Http\Controllers;

use App\Repository\ShippingRequestRepositoryContract;
use Illuminate\Http\Request;

class ShippingRequestController extends Controller
{

    protected $shippingRequestRepository;

    /**
     * ShippingRequestController constructor.
     *
     * @param ShippingRequestRepositoryContract $shippingRequestRepository;
     */
    public function __construct(ShippingRequestRepositoryContract $shippingRequestRepository)
    {
        $this->middleware('auth');

        $this->shippingRequestRepository = $shippingRequestRepository;
    }


    /**
     * Форма регистрация запрещенного для отправки посылки
     *
     * @return \Illuminate\Http\Response
     */
    public function form_scan()
    {
        return view('shipping_request.form_scan');
    }

    /**
     * Сканирвоание посылок под статусом(в складе) по номеру посылки
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function scan(Request $request)
    {
        $this->validate($request, ['number' => 'required|exists:shipping_requests,number']);

        $shipping = $this->shippingRequestRepository->findByNumber($request->number);

        return view('parcel.prohibited-items.form_register')->withShipping($shipping);
    }
}
