<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * @var string
     */
    public $prefix;

    public function __construct()
    {
        $this->prefix = config('acl.db_prefix');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->prefix . 'permission_role', function (Blueprint $table) {
            $table->string('id', 36)->primary()->unique();
            $table->string('permission_id', 36)->index();
            $table->string('role_id', 36)->index();
            $table->timestamps();

            $table->foreign('permission_id')
                ->references('id')
                ->on($this->prefix . 'permissions')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on($this->prefix . 'roles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->prefix . 'permission_role');
    }

}
