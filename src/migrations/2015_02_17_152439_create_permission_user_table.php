<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kodeine\Acl\Helper\Config;

class CreatePermissionUserTable extends Migration
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
		Schema::create($this->prefix . 'permission_user', function (Blueprint $table) {
			$table->string('id', 36)->primary()->unique();
			$table->string('permission_id', 36)->index();
			$table->string('user_id', 36)->index();
			$table->timestamps();
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on(Config::usersTableName())->onDelete('cascade');
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
		Schema::drop($this->prefix . 'permission_user');
	}

}
