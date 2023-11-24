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
        Schema::table('tbl_apply_for_reviewer', function (Blueprint $table) {
            //
            $table->string('field_of_study')->after('highest_education_level')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_apply_for_reviewer', function (Blueprint $table) {
            //
            $table->dropColumn('field_of_study');
        });
    }
};
