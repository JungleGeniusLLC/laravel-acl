<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kodeine\Acl\Helper\Config;

class CreateRoleUserTable extends Migration
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
        Schema::create($this->prefix . 'role_user', function (Blueprint $table) {
            $table->string('id', 36)->primary()->unique();
            $table->string('role_id', 36)->index();
            $table->string('user_id', 36)->index();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')
                ->on($this->prefix . 'roles')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on($this->prefix . Config::usersTableName())
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
        Schema::drop($this->prefix . 'role_user');
    }

}
