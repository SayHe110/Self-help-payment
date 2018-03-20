<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faults', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('title');
            $table->string('description')->coment('描述');
            $table->integer('dormitory_id')->index()->comment('宿舍号');
            $table->string('phone')->comment('联系电话');
            $table->boolean('arrival_processing')->default(false)->comment('是否到场处理');
            $table->integer('processing_person')->default(0)->index()->comment('处理人');
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
        Schema::dropIfExists('faults');
    }
}
