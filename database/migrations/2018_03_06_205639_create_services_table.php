<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // todo
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('服务名');
            $table->string('description')->nullable()->comment('描述');
            $table->integer('category_id')->index();
            $table->string('title_image_path')->comment('服务图标');
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
        Schema::dropIfExists('services');
    }
}
