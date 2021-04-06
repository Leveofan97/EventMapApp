<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("address");
            $table->json("coordinates");
            $table->text("full_description")->nullable();
            $table->string("short_description");
            $table->integer("max_people_count")->nullable();
            $table->dateTime("start_at");
            $table->dateTime("finish_at");
            $table->foreignId('author_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean("private")->default(0);
            $table->char("age_from")->nullable();
            $table->char("age_to")->nullable();
            $table->integer("price");
            $table->string("insta_link")->nullable();
            $table->string("site_link")->nullable();
            $table->string("vk_link")->nullable();
            $table->float("rating")->default(0);
            $table->boolean("active");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
