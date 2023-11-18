<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbl_masterdata', function (Blueprint $table) {
            //
        });

        DB::table('tbl_masterdata')->insert([
            [
                'masterdata_name' => 'officialEmail',
                'masterdata_value' => 'noreply@lisclick.xyz',
                'masterdata_details' => 'Email of LIS Program',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_masterdata', function (Blueprint $table) {
            //
        });
    }
};
