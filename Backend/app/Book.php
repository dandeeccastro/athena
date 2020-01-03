<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Book;
use App\Category;

class Book extends Model
{    

    public function insertBook(Request $req){
        $this->name = $req->name;
        $this->description = $req->description;
        $this->file = $req->file('file')->store('books');

        $category = Category::where("name",$req->category)->first();
        $this->categoryId = $category->id;
        $this->save();
    }

    public function updateBook(Request $req){
        if ($req->name)
            $this->name = $req->name;
        if ($req->description)
            $this->description = $req->description;
        if ($req->file)
            $this->file = $req->file;
        if ($req->category){
            $category = Category::where("name",$req->category)->first();
            $this->categoryId = $category->id;
        }
        $this->save();
    }
}
