<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->longText('description');
			$table->string('file');
			$table->bigInteger('categoryId')->unsigned()->nullable();
			$table->timestamps();
		});

		Schema::table('books', function (Blueprint $table) {
			$table->foreign('categoryId')->references('id')->on('categories')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('books');
	}
}
