<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Expense;

class Xablau extends Model
{
	public function insertXablau(Request $req){
		$this->year = $req->year;
		$this->month = $req->month;
		$this->updateBalance();
		$this->save();
	}

	public function updateXablau(Request $req){
		if ($req->year)
			$this->year = $req->year;
		if ($req->month)
			$this->month = $req->month;
		$this->save();
	}

	public function updateBalance(){
		$transactions = Expense::where('xablauId',$this->id);
		$income = 0.00;
		$outcome = 0.00;
		foreach ($transactions as $input){
			if ($input->isIncome)
				$income += $input->value;
			else
				$outcome += $input->value;
		} $this->balance = $income - $outcome;
		$this->save();
	}
}
