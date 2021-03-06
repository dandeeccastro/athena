<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->double('value');
			$table->string('name');
			$table->string('date');
			$table->boolean('isIncome');
			$table->bigInteger('xablauId')->unsigned()->nullable();
			$table->bigInteger('typeId')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('xablauId')->references('id')->on('xablaus')->onDelete('set null');
			$table->foreign('typeId')->references('id')->on('types')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('expenses');
	}
}
