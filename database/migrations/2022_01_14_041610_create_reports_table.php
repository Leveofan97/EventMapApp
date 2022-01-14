<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('reported_user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('reported_event_id')->references('id')->on('events')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("notes")->nullable();
            $table->integer("state")->nullable();
            $table->dateTime("created_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
