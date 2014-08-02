<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsdiariesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the users table (User HasMany diaries)

		Schema::create('users', function($table) {
			$table->increments('id');
			$table->timestamps();
			$table->boolean('remember_token');
			$table->string('login')->unique();
			$table->string('password');
			$table->string('firstname');
			$table->string('lastname');
		}); 

		
		// Create the diaries table (Diary HasMany pages)

		Schema::create('diaries', function($table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('keywords');
			
			// Foreing key
			$table->integer('user_id')->unsigned();

			// Define foreign keys.
			$table->foreign('user_id')->references('id')->on('users');

		}); 

		
		// Create the pages table (Page HasMany figures)

		Schema::create('pages', function($table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('info');
			$table->string('picture');
			
			// Foreing key
			$table->integer('diary_id')->unsigned();

			// Define foreign keys.
			$table->foreign('diary_id')->references('id')->on('diaries');

		}); 


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diaries', function($table) {
			$table->dropForeign('diaries_user_id_foreign'); 
		});

		Schema::table('pages', function($table) {
			$table->dropForeign('pages_diary_id_foreign'); 
		});
		

		Schema::drop('users');
		Schema::drop('diaries');
		Schema::drop('pages');
		
	}

}
