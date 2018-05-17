<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$FOMpEYbQTbOTtnEle8YP3e/B5GFWhQlXH3t8UPG911sFRGK0LwVQy', 'address' => '', 'suburb' => '', 'state' => '', 'postcode' => null, 'phone' => null, 'mobile' => null, 'remember_token' => '',],
            ['id' => 2, 'name' => 'customer', 'email' => 'customer@customer', 'password' => '$2y$10$dCzjHtZk/pxNdVqPLgHTXO4feB/xUS0iIRpskNqisb/NQFtMsZTlW', 'address' => '30 Hope street', 'suburb' => 'Rosehill', 'state' => 'NSW', 'postcode' => 2140, 'phone' => 444444444, 'mobile' => 444444444, 'remember_token' => null,],
            ['id' => 3, 'name' => 'stuff', 'email' => 'stuff@stuff.com', 'password' => '$2y$10$YhGsbYLbjDCtpCc6nyMCAOyz9FwjNZAKysRz3P3bZQ7tR.nlTr9d2', 'address' => '30 hope street', 'suburb' => 'rosehill', 'state' => 'nws', 'postcode' => 2140, 'phone' => 444444444, 'mobile' => 444444444, 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
