<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_attachment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attachment_id')->references('id')->on('attachments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('event_id')->references('id')->on('events')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_attachment');
    }
}
