<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->id();
            $table->string("text");
            $table->unsignedBigInteger("message_id");
            $table->unsignedBigInteger("next_message_id");
            $table->timestamps();

            $table->foreign("message_id")->references('id')->on('messages')->cascadeOnDelete();
            $table->foreign("next_message_id")->references('id')->on('messages')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buttons');
    }
};
