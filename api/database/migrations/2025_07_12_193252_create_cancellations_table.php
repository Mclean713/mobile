<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 'reason','details','customer_id','refund_amount','refund_processed',
     */
    public function up(): void
    {
        Schema::create('cancellations', function (Blueprint $table) {
            $table->id();
            $table->string('reason'); 
            $table->text('details')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('refund_amount', 10, 2)->nullable();
            $table->boolean('refund_processed')->default(false);
            $table->timestamp('cancelled_at')->useCurrent();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('manifests')
                  ->onDelete('cascade');
            $table->timestamps();     
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancellations');
    }
};
