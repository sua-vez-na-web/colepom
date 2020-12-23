<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Administrador',
                    'email' => 'uallas@colepom.com.br',
                    'password' => bcrypt('colepomadmin'),
                    'role_id' => Role::ADMINISTRATOR,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'is_active' => 1,
                ],
                [
                    'name' => 'SVW',
                    'email' => 'admin@admin',
                    'password' => bcrypt('password'),
                    'role_id' => Role::ADMINISTRATOR,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'is_active' => 1
                ],

            ]
        );
    }
}
