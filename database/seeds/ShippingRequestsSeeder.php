<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 13.06.2017
 * Time: 16:31
 */

use Illuminate\Database\Seeder;
use App\ShippingRequest;

class ShippingRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            $data = [
                'id' => '1',
                'number' => '0123456789',
                'client_id' => '1',
                'shipping_request_type_id'=>'1',
                'status_id'=>'1',
            ];

            \Illuminate\Support\Facades\DB::transaction(function () use ($data) {
                $ship_request = new ShippingRequest($data);
                $ship_request->save();
                $ship_request->parcels()->sync(1);
            });


        } catch (\Exception $e) {
            //Log::error($e);
        }
    }
}