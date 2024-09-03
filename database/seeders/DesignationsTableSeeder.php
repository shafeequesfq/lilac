<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            ['name' => 'Manager', 'created_at' => now()],
            ['name' => 'Developer', 'created_at' => now()],
            ['name' => 'Accountant', 'created_at' => now()],
        ]);
    }
}
