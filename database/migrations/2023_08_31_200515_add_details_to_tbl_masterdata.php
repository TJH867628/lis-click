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
        Schema::table('tbl_masterdata', function (Blueprint $table) {
            $table->string('masterdata_details')->after("masterdata_value")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_masterdata', function (Blueprint $table) {
            $table->dropColumn('masterdata_details');
        });
    }
};
