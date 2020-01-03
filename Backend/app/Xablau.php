<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Xablau extends Model
{
	public function insertXablau(Request $req){
		$this->year = $req->year;
		$this->month = $req->month;
		$this->save();
	}

	public function updateXablau(Request $req){
		if ($req->year)
			$this->year = $req->year;
		if ($req->month)
			$this->month = $req->month;
		$this->save();
	}
}
