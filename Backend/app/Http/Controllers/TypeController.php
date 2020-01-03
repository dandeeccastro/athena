<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
	//
	public function index(){
		$types = Type::all();
		if ($types){
			return response()->json(
				'data' => $types,
				'status' => 200
				]);
		} else {
			return response()->json([
				'message' => "Incapaz de pegar tipo de gasto!",
				'status' => 400
			]);
		}
	}

	public function show($id){
		$type = Type::findOrFail($id);
		if ($type){
			return response()->json([
				'data' => $type,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Tipo de gasto em questão não foi encontrado!",
				'status' => 400
			]);
		}
	}

	public function store(Request $req){
		$type = new Type();
		$type->insertType($req);
		if ($type){
			return response()->json([
				'data' => $type,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Incapaz de atualizar o tipo de gasto!",
				'status' => 400
			]);
		}
	}

	public function update(Request $req, $id){
		$type = Type::findOrFail($id);
		$type->updateType($req);
		return response()->json([
			'data' => $type,
			'status' => 200
		]);
	}

	public function destroy($id){
		$type = Type::findOrFail($id);
		$type = Type::destroy($id);
		if ($type){
			return response()->json([
				'data' => $type,
				'status' => 200
			]);
		} else {
			return response()->json([
				'mesage' => "Tipo é imortal!",
				'status' => 400
			]);
		}
	}
}
