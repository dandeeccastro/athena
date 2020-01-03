<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
{
	public function index(){
		$expenses = Expense::all();
		if ($expenses){
			return response()->json(
				'data' => $expenses,
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
		$expense = Expense::findOrFail($id);
		if ($expense){
			return response()->json([
				'data' => $expense,
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
		$expense = new Expense();
		$expense->insertExpense($req);
		if ($expense){
			return response()->json([
				'data' => $expense,
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
		$expense = Expense::findOrFail($id);
		$expense->updateExpense($req);
		return response()->json([
			'data' => $expense,
			'status' => 200
		]);
	}

	public function destroy($id){
		$expense = Expense::findOrFail($id);
		$expense = Expense::destroy($id);
		if ($expense){
			return response()->json([
				'data' => $expense,
				'status' => 200
			]);
		} else {
			return response()->json([
				'message' => "Tipo é imortal!",
				'status' => 400
			]);
		}
	}
}
