<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormitoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dormitories', function (Blueprint $table) {
            $table->increments('dorm_id');
            $table->string('dorm_name')->index();
            $table->integer('parent_dorm_code')->default(0);
            $table->boolean('is_unit_building')->default(false);
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
        Schema::dropIfExists('dormitories');
    }
}
