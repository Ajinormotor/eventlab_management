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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('details');
            $table->string('email');
            $table->date('date');
            $table->time('time');
            $table->string('phone_no');
            $table->string('speaker');
            $table->string('speaker_image');
            $table->enum('type',['free', 'paid'])->default('free');
            $table->string('price');
            $table->integer('seat');
            $table->string('hall');
            $table->enum('progress', ['pending', 'canceled', 'approved'])->default('pending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
