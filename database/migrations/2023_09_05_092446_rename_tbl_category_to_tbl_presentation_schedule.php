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
        Schema::table('tbl_category', function (Blueprint $table) {
            $table->dropColumn('categoryName');
            $table->dropColumn('categoryCode');

            $table->string('presentationLink')->after('id');
            $table->string('presentationTime')->after('id');
            $table->string('presentationGroup')->after('id');
            $table->rename('tbl_presentation_schedule');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_presentation_schedule', function (Blueprint $table) {
            $table->dropColumn('presentationGroup');
            $table->dropColumn('presentationTime');
            $table->dropColumn('presentationLink');

            $table->string('categoryCode')->before('id');
            $table->string('categoryName')->before('id');
            $table->rename('tbl_category');
        });
    }
};
