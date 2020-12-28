<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Parques Temáticos',
                'description' => 'Parques Temáticos',
                'is_active' => true,
            ],
            [
                'name' => 'Cinemas, Teatros e Shows',
                'description' => 'Cinemas, Teatros e Shows',
                'is_active' => true,
            ],
            [
                'name' => 'Lojas Virtuais e de Departamentos',
                'description' => 'Lojas Virtuais e de Departamentos',
                'is_active' => true,
            ],
            [
                'name' => 'Loja de Fábrica',
                'description' => 'Loja de Fábrica',
                'is_active' => true,
            ],
            [
                'name' => 'Faculdades e Universidades',
                'description' => 'Faculdades e Universidades',
                'is_active' => true,
            ],
            [
                'name' => 'Cursos Técnicos e de Idiomas',
                'description' => 'Cursos Técnicos e de Idiomas',
                'is_active' => true,
            ],
            [
                'name' => 'Academias e Centros de Treinamento',
                'description' => 'Academias e Centros de Treinamento',
                'is_active' => true,
            ],
            [
                'name' => 'Spas e Estética',
                'description' => 'Spas e Estética',
                'is_active' => true,
            ],
            [
                'name' => 'Turismo',
                'description' => 'Turismo',
                'is_active' => true,
            ],
            [
                'name' => 'Bebê',
                'description' => 'Bebê',
                'is_active' => true,
            ],
            [
                'name' => 'Pets',
                'description' => 'Pets',
                'is_active' => true,
            ],
            [
                'name' => 'Gastronomia',
                'description' => 'Gastronomia',
                'is_active' => true,
            ],
            [
                'name' => 'Drograrias',
                'description' => 'Drograrias',
                'is_active' => true,
            ],
            [
                'name' => 'Eletrônicos e Eletrodomésticos',
                'description' => 'Eletrônicos e Eletrodomésticos',
                'is_active' => true,
            ],

        ]);
    }
}
