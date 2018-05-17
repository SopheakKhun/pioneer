<?php

use Illuminate\Database\Seeder;

class TaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'CDHOME', 'description' => 'Servicing ', 'status_id' => 1, 'attachment' => null, 'due_date' => '19/05/2018', 'user_id' => 3,],

        ];

        foreach ($items as $item) {
            \App\Task::create($item);
        }
    }
}
