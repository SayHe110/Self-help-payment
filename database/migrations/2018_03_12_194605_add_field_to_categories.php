<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table){
            $table->integer('parent_id')->default(0)->after('id')->index()->comment('分类父类ID');
            $table->string('title_image_path')->nullable()->comment('分类图标');
            $table->string('url')->nullable()->comment('跳转地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table){
            $table->dropColumn('parent_id');
            $table->dropColumn('title_image_path');
            $table->dropColumn('url');
        });
    }
}
