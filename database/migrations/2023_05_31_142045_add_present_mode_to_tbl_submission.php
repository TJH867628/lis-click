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
            $table->string('presentMode',255)->after('submissionType');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_submission', function (Blueprint $table) {
            $table->removeColumn('presentMode');
        });
    }
};
