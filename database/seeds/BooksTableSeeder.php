<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => "O Livro Topperson",
            'description' => "Um livro incrível mesmo, fé q é bom",
            'file' => "no",
            'categoryId' => null
        ]);
        DB::table('books')->insert([
            'name' => "O Livro Mais Topperson",
            'description' => "Um livro foda mesmo, fé q é bom",
            'file' => "no",
            'categoryId' => null
        ]);
        DB::table('books')->insert([
            'name' => "O Livro Brabo",
            'description' => "Um livro brabo mesmo, fé q é bom",
            'file' => "no",
            'categoryId' => null
        ]);
        DB::table('books')->insert([
            'name' => "O Livro Gay",
            'description' => "Um livro gay mesmo, fé q é bom",
            'file' => "no",
            'categoryId' => null
        ]);
    }
}
