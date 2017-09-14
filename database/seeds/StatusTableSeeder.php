<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::truncate();

        $status = [
            ['id' => '1', 'name' => 'В складе', 'available' => '1'],
            ['id' => '2', 'name' => 'Запрещен', 'available' => '1'],
            ['id' => '3', 'name' => 'Отправлен', 'available' => '1'],
        ];

        Status::insert($status);
    }
}
