<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialiteClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('socialite_clients')) {
            Schema::create('socialite_clients', function (Blueprint $table) {
                $table->increments('id')->comment('主键id');
                $table->string('name')->default('')->comment('第三方登入名称');
                $table->string('icon')->default('')->comment('图标');
                $table->string('client_id')->default('')->comment('client_id');
                $table->string('client_secret')->default('')->comment('client_secret');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socialite_clients');
    }
}
