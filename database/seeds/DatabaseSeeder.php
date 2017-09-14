<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ShippingRequestTypesTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(ShippingRequestsSeeder::class);
        $this->call(ParcelsTableSeeder::class);
    }
}
