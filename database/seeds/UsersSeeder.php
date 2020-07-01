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
                    'email' => 'adm@colepom.com.br',
                    'password'=> bcrypt('adm'),
                    'role_id' => Role::ADMINISTRATOR
                ],
                [
                    'name' => 'Sindicato',
                    'email' => 'sindicato@colepom.com.br',
                    'password'=> bcrypt('sindicato'),
                    'role_id' => Role::SYNDICATE
                ],
                [
                    'name' => 'Associado',
                    'email' => 'associado@colepom.com.br',
                    'password'=> bcrypt('associado'),
                    'role_id' => Role::AFFILIATE
                ],
                [
                    'name' => 'Parceiro',
                    'email' => 'parceiro@colepom.com.br',
                    'password'=> bcrypt('parceiro'),
                    'role_id' => Role::PARTNER
                ],
                [
                    'name' => 'Visisante',
                    'email' => 'visitante@colepom.com.br',
                    'password'=> bcrypt('visitante'),
                    'role_id' => Role::GUEST
                ],
            ]
        );
    }
}
