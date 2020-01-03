<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xablau;

class XablauController extends Controller
{
	public function index(){
		$xablaus = Xablau::all();
		if ($xablaus){
			return response()->json([
				'data' => $xablaus,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Incapaz de pegar xablau!",
				'status' => 400
			]);
		}
	}

	public function show($id){
		$xablau = Xablau::findOrFail($id);
		if ($xablau){
			return response()->json([
				'data' => $xablau,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Xablau em questão não foi encontrado!",
				'status' => 400
			]);
		}
	}

	public function store(Request $req){
		$xablau = new Xablau();
		$xablau->insertXablau($req);
		if ($xablau){
			return response()->json([
				'data' => $xablau,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Incapaz de atualizar o xablau!",
				'status' => 400
			]);
		}
	}

	public function update(Request $req, $id){
		$xablau = Xablau::findOrFail($id);
		$xablau->updateXablau($req);
		return response()->json([
			'data' => $xablau,
			'status' => 200
		]);
	}

	public function destroy($id){
		$xablau = Xablau::findOrFail($id);
		$xablau = Xablau::destroy($id);
		if ($xablau){
			return response()->json([
				'data' => $xablau,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Tipo é imortal!",
				'status' => 400
			]);
		}
	}

	public function findByDate($month,$year){
		$xablau = Xablau::where('year',$year)->where('month',$month)->first();
		if ($xablau) {
			return response()->json([
				'data' => $xablau,
				'status' => 200
			]);	
		}
		else {
			return response()->json([
				'message' => 'Xablau não encontrado',
				'status' => 400
			]);
		}

	}
}
