<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configurations', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('label');
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->enum('type', ['textbox', 'textarea', 'wysiwyg' , 'file', 'date', 'time', 'datetime', 'number', 'checkbox', 'radio', 'select', 'multiple']);
            $table->text('options')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configurations');
	}

}
