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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('vehicle_make');
            $table->string('vehicle_model');
            $table->date('date');
            $table->unsignedBigInteger('slot_id');
            $table->boolean('status')->default(false)->comment('To know if the booking has been treated or not');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['date', 'slot_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
