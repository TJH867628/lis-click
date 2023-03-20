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
        Schema::create('tbl_logfile', function (Blueprint $table) {
            $table->id();
            $table->integer('logID')->unique();
            $table->string('action');
            $table->string('description');
            $table->timestamp('date');
            $table->string('doneBy');
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
        Schema::dropIfExists('tbl_logfile');
    }
};
