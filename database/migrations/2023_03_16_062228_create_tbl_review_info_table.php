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
        Schema::create('tbl_review_info', function (Blueprint $table) {
            $table->id();
            $table->string('reviewerNo');
            $table->string('reciewerID')->unique();
            $table->string('IC_No');
            $table->string('email');
            $table->string('name',500);
            $table->string('title');
            $table->string('organizationName');
            $table->string('organizationAddress');
            $table->string('position');
            $table->integer('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
            $table->timestamps();

            $table->foreign('email')->references('email')->on('tbl_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_review_info');
    }
};
