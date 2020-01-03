<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xablau;

class XablauController extends Controller
{
	public function index(){
		$xablaus = Xablau::all();
		if ($xablaus){
			return response()->json($xablaus);
		} else {
			return response()->json([
				'message' => "Incapaz de pegar tipo de gasto!",
				'status' => 400
			]);
		}
	}

	public function show($id){
		$xablau = Xablau::findOrFail($id);
		if ($xablau){
			return response()->json([$xablau]);
		} else {
			return response()->json([
				'message' => "Tipo de gasto em questão não foi encontrado!",
				'status' => 400
			]);
		}
	}

	public function store(Request $req){
		$xablau = new Xablau();
		$xablau->insertXablau($req);
		if ($xablau){
			return response()->json([$xablau]);;
		} else {
			return response()->json([
				'message' => "Incapaz de atualizar o tipo de gasto!",
				'status' => 400
			]);
		}
	}

	public function update(Request $req, $id){
		$xablau = Xablau::findOrFail($id);
		$xablau->updateXablau($req);
		return response()->json([$xablau]);
	}

	public function destroy($id){
		$xablau = Xablau::findOrFail($id);
		$xablau = Xablau::destroy($id);
		if ($xablau){
			return response()->json([$xablau]);
		} else {
			return response()->json([
				'mesage' => "Tipo é imortal!",
				'status' => 400
			]);
		}
	}
}
