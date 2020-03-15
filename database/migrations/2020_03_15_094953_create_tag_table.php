<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag', function (Blueprint $table) {
            $table->increments('id')->comment('标签主键');
            $table->string('name', 20)->default('')->comment('标签名');
            $table->string('slug')->default('')->comment('slug');
            $table->string('keywords')->default('')->comment('标签的关键字');
            $table->string('description')->default('')->comment('标签的描述');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag');
    }
}
