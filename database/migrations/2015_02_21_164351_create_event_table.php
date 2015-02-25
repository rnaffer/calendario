<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("link");
			$table->string("name");
			$table->timestamps();
		});

		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date("date");
			$table->string("title");
			$table->smallInteger("grade");
			$table->integer("type_id")->unsigned();
			$table->foreign("type_id")->references('id')->on('type');
			$table->text("description");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('type');
		Schema::drop('events');
	}

}
