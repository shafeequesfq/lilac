<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            [
                'name' => 'John Doe',
                'fk_department' => 1, // Assuming this corresponds to Human Resources
                'fk_designation' => 1, // Assuming this corresponds to Manager
                'phone_number' => '1234567890',
                'created_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'fk_department' => 2, // Assuming this corresponds to IT Department
                'fk_designation' => 2, // Assuming this corresponds to Developer
                'phone_number' => '0987654321',
                'created_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'fk_department' => 3, // Assuming this corresponds to Finance
                'fk_designation' => 3, // Assuming this corresponds to Accountant
                'phone_number' => '1122334455',
                'created_at' => now(),
            ],
        ]);
    }
}
