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
        Schema::create('game_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['minimum', 'recommended']);
            $table->string('cpu');
            $table->string('ram');
            $table->string('video_card');
            $table->string('vram')->nullable();
            $table->string('os');
            $table->string('directx')->nullable();
            $table->string('pixel_shader')->nullable();
            $table->string('vertex_shader')->nullable();
            $table->string('network')->nullable();
            $table->string('disk_space')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_specs');
    }
};
