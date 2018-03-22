<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectricityFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electricity_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dormitory_id')->unique()->index()->comment('宿舍ID');
            $table->integer('balance_of_electricity')->comment('电量余额');
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
        Schema::dropIfExists('electricity_fees');
    }
}
