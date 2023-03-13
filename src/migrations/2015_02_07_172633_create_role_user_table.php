<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
		$table->string('id', 36)->primary()->unique();
		$table->string('role_id', 36)->index();
		$table->string('user_id', 36)->index();
		$table->timestamps();
		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_user');
    }

}
