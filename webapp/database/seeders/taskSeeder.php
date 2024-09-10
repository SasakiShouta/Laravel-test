<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('tasks')->insert([
            [   
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'id' => '1',
                'user_id' => '1',
                'title' => '宿題',
                'comment' =>'宿題',
            ],
        ]);
    }
}
