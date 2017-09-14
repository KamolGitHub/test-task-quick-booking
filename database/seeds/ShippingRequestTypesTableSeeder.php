<?php

use Illuminate\Database\Seeder;
use App\ShippingRequestType;

class ShippingRequestTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingRequestType::truncate();

        $types = [
            ['id' => '1', 'name' => 'ТИП 1',
                'template'=>'Эта посылка содержит запрещенные к пересылке товары, обнаруженные при подготовке отправления %shipping_request-number%.
                
Что можно сделать с этой посылкой:
- Мы можем ее удалить
- Мы можем попробовать вернуть ее продавцу, если сроки возврата не вышли 

Обратитесь в нашу поддержку, мы будем стараться вам помочь.',
                'available' => '1'],

            ['id' => '2', 'name' => 'ТИП 2',
                'template'=>'Эта посылка содержит запрещенные к пересылке товары, обнаруженные при подготовке отправления %shipping_request-number%.

Что можно сделать с этой посылкой:
- Мы можем попробовать отправить ее с помощью Почты (USPS).
- Мы можем ее удалить.
- Мы можем попробовать вернуть ее продавцу, если сроки возврата не вышли. 

Обратитесь в нашу поддержку, мы будем стараться вам помочь.',
                'available' => '1'],
        ];

        ShippingRequestType::insert($types);
    }
}
