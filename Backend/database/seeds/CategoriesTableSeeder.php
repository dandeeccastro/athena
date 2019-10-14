<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "Aprendizado Profissional"
        ]);
        DB::table('categories')->insert([
            'name' => "Aprendizado Pessoal"
        ]);
        DB::table('categories')->insert([
            'name' => "Entretenimento"
        ]);
        DB::table('categories')->insert([
            'name' => "Outros"
        ]);
    }
}
