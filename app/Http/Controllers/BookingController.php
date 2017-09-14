<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{

    public $headers = [
        'X-Requested-With' => 'XmlHttpRequest',
        'KoSiteKey' => 'test198',
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.quick_booking');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'from' => 'required|date_format:Y-m-d|after:today',
            'to' => 'required|date_format:Y-m-d|after:today',
            "name" => "required|alpha",
            'phone' => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $body['site_id'] = 100;
        $body['type'] = 'order';

        $body['data'] = [
            ['name' => 'Имя', 'value' => $request->name],
            ['name' => 'Дата заезда', 'value' => $request->from],
            ['name' => 'Дата выезда', 'value' => $request->to],
            ['name' => 'Телефон', 'value' => $request->phone],
        ];

        try {
            $client = new \GuzzleHttp\Client();

            $result = $client->request('POST', 'https://ko.tour-shop.ru/siteLead', ['form_params' => $body, 'headers' => $this->headers]);

            //dd(empty((string)$resultBody));
            if (!empty($result->getBody()) && $result->getStatusCode() == 200) {
                if (strpos($result->getBody(), "error") !== false) {

                    return redirect()->back()->withErrors($this->parseResponseError($result->getBody()))->withInput();;

                } else {
                    return redirect()->back()->with('flash_message', "Спасибо. Ваша заявка принято!");
                }
            }

            return redirect()->back()->withErrors("Неверный ответ")->withInput();

        } catch (RequestException $e) {
            Log::error($e);
            return redirect()->back()->withErrors("Неверный ответ")->withInput();;
        }

    }

    /**
     *
     * @param $body
     * @return string $param
     */
    private function parseResponseError($body)
    {
        $message = "";

        if (!empty($body)) {
            if (strpos($body, "error") !== false) {

                $code = explode(':', $body);

                switch ($code[1]) {
                    case "403":
                        $message = "Неверный доступ";
                        break;
                    case "data":
                        $message = "Неверно передан параметр data";
                        break;
                    case "data-value":
                        $message = "Неверные данные параметра data";
                        break;
                    default:
                        $message = "Неизвестная ошибка";
                        break;
                }
            }
        }

        return $message;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
