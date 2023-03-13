<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
		$table->string('id', 36)->primary()->unique();
		$table->string('inherit_id', 36)->nullable()->index();
		$table->string('name')->index();
		$table->text('slug');
		$table->text('description')->nullable();
		$table->timestamps();
        });

        Schema::table('permissions', function (Blueprint $table) {
		$table->foreign('inherit_id')->references('id')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }

}
