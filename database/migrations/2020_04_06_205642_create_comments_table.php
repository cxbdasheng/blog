<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('socialite_user_id')->unsigned()->default(0)->comment('评论用户id 关联socialite_user表的id');
            $table->boolean('type')->default(1)->comment('1：文章评论');
            $table->integer('pid')->unsigned()->default(0)->comment('父级id');
            $table->integer('article_id')->unsigned()->comment('文章id');
            $table->text('content')->comment('内容');
            $table->boolean('is_audited')->comment('是否已经通过审核');
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
        Schema::dropIfExists('comments');
    }
}
