<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	public function insertType(Request $req){
		$this->name = $req->name;
		$this->save();
	}

	public function updateType(Request $req){
		if($req->name)
			$this->name = $req->name;
		$this->save();
	}
}
