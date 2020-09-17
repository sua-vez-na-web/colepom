<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'administradores',
            'description' => 'Perfil de Administrador'
        ]);

        Role::create([
            'name' => 'sindicatos',
            'description' => 'Perfil de Sindicato'
        ]);

        Role::create([
            'name' => 'associados',
            'description' => 'Perfil Associados'
        ]);

        Role::create([
            'name' => 'parceiros',
            'description' => 'Perfil de Parceiro'
        ]);
    }
}
