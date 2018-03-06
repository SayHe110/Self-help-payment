<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id')->unique()->index()->comment('学号');
            $table->string('password');
            $table->string('email')->nullable()->unique()->comment('邮箱地址');
            $table->string('nickname')->default('')->nullable()->comment('昵称');
            $table->string('avatar')->default('')->nullable()->comment('头像');
            $table->string('dormitory_id')->default(0)->comment('宿舍号');
            $table->boolean('is_verify')->default(false)->comment('是否验证');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
