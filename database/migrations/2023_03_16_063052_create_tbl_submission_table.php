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
        Schema::create('tbl_submission', function (Blueprint $table) {
            $table->id();
            $table->integer('submissionID')->unique();;
            $table->string('submissionCode');
            $table->string('submissionTitle');
            $table->string('submissionType');
            $table->string('paperLink');
            $table->string('posterLink');
            $table->string('abstractLink');
            $table->string('returnPaperLink');
            $table->string('participants1');
            $table->string('participants2');
            $table->string('participants3');
            $table->string('categoryCode');
            $table->string('reviewStatus');
            $table->string('paymentID');
            $table->string('reviewerID');
            $table->string('publish');
            $table->integer('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
            $table->timestamps();

            $table->foreign('participants1')->references('email')->on('tbl_participants_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_submission');
    }
};
