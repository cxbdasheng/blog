<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praise', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键id');
            $table->integer('article_id')->unsigned()->default(0)->comment('文章id');
            $table->string('ip', 16)->default('')->comment('点赞ip');
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
        Schema::dropIfExists('praise');
    }
}
