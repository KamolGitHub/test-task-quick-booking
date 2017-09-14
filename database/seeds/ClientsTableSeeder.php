<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Client::create([
                'id' => '1',
                'full_name' => 'Аркадий Павлов',
                'email' => 'test2@mail.com',
                'partner_id' => '1',
                'available' => '1'
            ]);
        } catch (\Exception $e) {
            //Log::error($e);
        }
    }
}
