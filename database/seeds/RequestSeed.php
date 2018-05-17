<?php

use Illuminate\Database\Seeder;

class RequestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'customer_id' => 2, 'product_name' => 'Aircon', 'prefer_date' => '19/05/2018 02:17:48', 'description' => 'Servicing ',],

        ];

        foreach ($items as $item) {
            \App\Request::create($item);
        }
    }
}
