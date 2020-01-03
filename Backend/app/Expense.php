<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Expense extends Model
{
	public function insertExpense(Request $req){
		$this->value = $req->value;
		$this->date = $req->date;
		$this->name = $req->name;

		$month = date('M',$req->date);
		$year = date('Y',$req->date);
		$xablau = Xablau::where('year',$year)->where('month',$month)->first();
		$this->xablauId = $xablau->id;

		$type = Type::where('name',$req->type)->first();
		$this->typeId = $type->id;

		$this->save();
	}
	public function updateExpense(Request $req){
		if($req->value)
			$this->value = $req->value;
		if($req->date)
			$this->date = $req->date;
		if($req->name)
			$this->name = $req->name;
		if($req->type){
			$type = Type::where('name',$req->type)->first();
			$this->typeId = $type->id;
		}
		if($req->xablau){
			$month = date('M',$req->date);
			$year = date('Y',$req->date);
			$xablau = Xablau::where('year',$year)->where('month',$month)->first();
			$this->xablauId = $xablau->id;
		}

		$this->save();
	}
}