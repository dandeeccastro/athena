<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => "Entretenimento",
        ]);
        DB::table('types')->insert([
            'name' => "Saúde",
        ]);
        DB::table('types')->insert([
            'name' => "Contas",
        ]);
        DB::table('types')->insert([
            'name' => "Transporte Público",
        ]);
        DB::table('types')->insert([
            'name' => "Transporte Privado",
        ]);
        DB::table('types')->insert([
            'name' => "Alimentação",
        ]);
        DB::table('types')->insert([
            'name' => "Investimento",
        ]);
}
