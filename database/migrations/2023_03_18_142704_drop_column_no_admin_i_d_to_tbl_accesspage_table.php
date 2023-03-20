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
        Schema::table('tbl_accesspage', function (Blueprint $table) {
            $table->dropColumn('no');
            $table->dropColumn('adminID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_accesspage', function (Blueprint $table) {
            $table->integer('no')->after('id');
            $table->string('adminID')->after('no');
        });
    }
};
