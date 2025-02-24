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
        Schema::table('tbl_submission', function (Blueprint $table) {
            $table->string('presentation_certificate')->nullable()->default('pending')->after('certificate');
            $table->renameColumn('certificate', 'participants_certificate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_submission', function (Blueprint $table) {
            //
            $table->dropColumn('presentation_certificate');
            $table->renameColumn('participants_certificate', 'certificate');
        });
    }
};
