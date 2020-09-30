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
                    'password' => bcrypt('colepom2020'),
                    'role_id' => Role::ADMINISTRATOR,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

            ]
        );
    }
}
