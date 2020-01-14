<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_bind', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('role')->comment('teacher 1, student 2');
            $table->string('provider', 18)->comment('第三方账号，比如line');
            $table->string('provider_id', 100)->comment('第三方账号id');
            $table->string('role_id')->comment('角色表中的id');
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
        Schema::dropIfExists('social');
    }
}
