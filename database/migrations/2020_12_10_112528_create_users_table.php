<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("remember_token")->nullable();
            $table->string("first_name");
            $table->string("phone")->default(0);
            $table->string("last_name");
            $table->string("middle_name")->nullable();
            $table->string("email");
            $table->string("password");
            $table->string("login");
            $table->boolean('is_active');
            $table->boolean('is_blocked');
            $table->boolean('is_moderator');
            $table->boolean('is_verified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
