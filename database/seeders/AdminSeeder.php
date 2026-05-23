<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'abukhshba77@gmail.com'],
            [
                'name' => 'Mahmoud Abukhashaba',
                'password' => bcrypt('123123123'),
            ]
        );
    }
}
