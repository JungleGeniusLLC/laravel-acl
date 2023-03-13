<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission_user', function (Blueprint $table) {
			$table->string('id', 36)->primary()->unique();
			$table->string('permission_id', 36)->index();
			$table->string('user_id', 36)->index();
			$table->timestamps();
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permission_user');
	}

}
