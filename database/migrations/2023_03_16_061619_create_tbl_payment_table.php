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
        Schema::create('tbl_payment', function (Blueprint $table) {
            $table->id();
            $table->integer('paymentID')->unique();
            $table->float('amount');
            $table->string('paymentStatus');
            $table->timestamp('paymentDate');
            $table->string('proofOfPayment');
            $table->integer('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_payment');
    }
};
