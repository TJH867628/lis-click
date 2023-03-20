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
        Schema::table('tbl_review_info', function (Blueprint $table) {
            $table->dropColumn('reviewerNo');
            $table->dropColumn('reciewerID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_review_info', function (Blueprint $table) {
            $table->integer('reviewerNo')->after('id');
            $table->string('reviewerID')->after('reviewerNo');
        });
    }
};
