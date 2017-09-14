<?php

use Illuminate\Database\Seeder;
use App\Parcel;

class ParcelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        try {
            Parcel::create([
                'number' => 'p311705-0001',
                'tracking_number' => '1122334455',
                'bar_code' => '3117050001',
                'weight' => '12',
                'client_id' => '1',
                'created_by' => '1',
                'status_id' => '1'
            ]);

        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
