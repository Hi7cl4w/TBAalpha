<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin',function(Blueprint $table)
		{
			$table->Integer('admin_id');
			$table->String('admin_name' , 128 );
			$table->String('designation' , 256 );
			$table->String('admin_email' , 128 );			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin');
	}

}
