<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            User::create([
                'id' => '1',
                'name' => 'Тест',
                'email' => 'test@mail.com',
                'password' => bcrypt('secret'),
                'available' => '1'
            ]);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
