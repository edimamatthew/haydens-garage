<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blocked_slots', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('slot_id')->nullable();
            $table->timestamps();

            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['date', 'slot_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocked_slots');
    }
};
