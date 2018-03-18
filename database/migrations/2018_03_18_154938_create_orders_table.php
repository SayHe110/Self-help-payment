<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->bigInteger('order_num')->unique()->index()->comment('订单号');
            $table->integer('dorm_id')->index()->comment('宿舍ID');
            $table->integer('money');
            $table->integer('processing_person_id')->nullable()->comment('处理的管理员');
            $table->boolean('is_handle')->default(false)->comment('是否处理');
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
        Schema::dropIfExists('orders');
    }
}
