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
        Schema::create('tbl_apply_for_reviewer', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('highest_level_education');
            $table->string('file_to_support')->nullable();
            $table->string('accountName');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_apply_for_reviewer');
    }
};
