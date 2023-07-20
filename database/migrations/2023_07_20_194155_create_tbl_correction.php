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
        Schema::create('tbl_correction', function (Blueprint $table) {
            $table->id();
            $table->string('submissionCode');
            $table->integer('numberOfTimes');
            $table->string('commentForCorrection');
            $table->string('returnCorrectionLink')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_correction');
    }
};
