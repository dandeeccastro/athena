<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function insertCategory(Request $req){
        $this->name = $req->name;
        $this->save();
    }

    public function updateCategory(Request $req){
        if ($req->name)
            $this->name = $req->name;
        $this->save();
    }
}
