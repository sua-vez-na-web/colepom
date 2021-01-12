<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Matthaus Nawan',
                'email' => 'matthausnawan@gmail.com',
                'password' => bcrypt('123123123'),
                'role_id' => Role::ADMINISTRATOR,
                'is_active' => true,
            ],
            [
                'name' => 'SVW',
                'email' => 'anderson@svw.com.info',
                'password' => bcrypt('123123123'),
                'role_id' => Role::ADMINISTRATOR,
                'is_active' => true,
            ],
        ];

        User::insert($admins);
    }
}
