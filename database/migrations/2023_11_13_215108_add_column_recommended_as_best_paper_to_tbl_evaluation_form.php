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
        Schema::table('tbl_evaluation_form', function (Blueprint $table) {
            //
            $table->boolean('recommended_as_best_paper')->default(false)->after('specific_reject_reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_evaluation_form', function (Blueprint $table) {
            //
            $table->dropColumn('recommended_as_best_paper');
        });
    }
};
