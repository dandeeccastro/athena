<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public $data = "Deu ruim";
    public function index(){
        $categories = Category::all();
        if ($categories){
            return response()->json([$categories]);
        } else {
            return response()->error($data,400);
        }
    }

    public function show($id){
        $category = Category::findOrFail($id);
        if ($category){
            return response()->json([$category]);
        } else {
            return response()->error($data,400);
        }
    }

    public function store(Request $req){
        $category = new Category();
        $category->insertCategory($req);
        if ($category){
            return response()->json([$category]);;
        } else {
            return response()->error($data,400);
        }
    }

    public function update(Request $req, $id){
        $category = Category::findOrFail($id);
        $category->updateCategory($req);
        return response()->json([$category]);
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category = Category::destroy($id);
        if ($category){
            return response()->json([$category]);
        } else {
            return response()->error($data,400);
        }
    }
}
