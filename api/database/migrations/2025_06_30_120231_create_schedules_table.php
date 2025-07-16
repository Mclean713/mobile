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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreignId('busId')->constrained('buses')->onDelete('cascade');
            $table->foreignId('driverId')->constrained('drivers')->onDelete('cascade');
            $table->foreignId('routeId')->constrained('routes')->onDelete('cascade');
            $table->date('StartDate');
            $table->time('DepartureTime');
            $table->string('Status')->nullable();
            $table->float('price');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
