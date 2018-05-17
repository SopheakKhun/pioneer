<?php

use Illuminate\Database\Seeder;

class BookingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'customer_id' => 3, 'installer' => 'PK', 'date_install' => '19/05/2018', 'model' => 'Mobile', 'serial' => '1233455',],

        ];

        foreach ($items as $item) {
            \App\Booking::create($item);
        }
    }
}
