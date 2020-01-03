<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Xablau;

class Expense extends Model
{
	public function insertExpense(Request $req){
		$this->value = $req->value;
		$this->date = $req->date;
		$this->name = $req->name;
		$this->isIncome = $req->isIncome;

		$type = Type::where('name',$req->type)->first();
		$this->typeId = $type->id;

		$this->save(); // Salvo para que value esteja no BD e seja usado em sum no xablau

		$located = $this->locateXablau($req->date);
		$req->month = $located->month;
		$req->year = $located->year;
		$this->insertXablau($located->xablau,$req);

		$this->save();
	}

	public function updateExpense(Request $req){
		if($req->value)
			$this->value = $req->value;
		if($req->date){
			$this->date = $req->date;
			$located = $this->locateXablau($req->date);
			$req->month = $located->month;
			$req->year = $located->year;
			$this->updateXablau($located->xablau,$req);
		}
		if($req->name)
			$this->name = $req->name;
		if($req->isIncome)
			$this->isIncome = $req->isIncome;
		if($req->type){
			$type = Type::where('name',$req->type)->first();
			$this->typeId = $type->id;
		}

		$this->save();
	}

	private function locateXablau($date){
		$foundData = (object) null;

		$month = date('m',strtotime($date));
		$year = date('Y',strtotime($date));
		$xablau = Xablau::where('year',$year)->where('month',$month)->first();

		$foundData->month = $month;
		$foundData->year = $year;
		$foundData->xablau = $xablau;

		return $foundData;
	}

	private function insertXablau($xablau,$req){
		if(!$xablau) {
			$xablau = new Xablau();
			$xablau->insertXablau($req);
		}
		$this->xablauId = $xablau->id;
	}

	private function updateXablau($xablau,$req){
		if (!$xablau) // Ainda não existia xablau para essa expense
			$this->insertXablau($xablau,$req);
		else if ($xablau->id !== $this->xablauId){  // Mudamos de Xablau
			$this->xablauId = $xablau->id;
			$xablau->updateBalance();
		}
	}

}
