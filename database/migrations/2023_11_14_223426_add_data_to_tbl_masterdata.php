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
                'masterdata_name' => 'officialAddress',
                'masterdata_value' => 'Jalan Nitar, 86800 Mersing Johor',
                'masterdata_details' => 'Official Address',
                'masterdata_type' => 'OfficialAddress',
                'created_at' => now(),
                'updated_at'=> now(),
            ],
            [
                'masterdata_name' => 'officialContactNumber',
                'masterdata_value' => '(+60) - 07798 0001',
                'masterdata_details' => 'Official Contact Number',
                'masterdata_type' => 'OfficialContactNumber',
                'created_at' => now(),
                'updated_at'=> now(),
            ],
            [
                'masterdata_name' => 'officialWorkingTime',
                'masterdata_value' => 'Mon - Fri: 08.00 - 16.00.
                                        Sat: 10.00 - 14.00',
                'masterdata_details' => 'Official Working Time',
                'masterdata_type' => 'OfficialWorkingTime',
                'created_at' => now(),
                'updated_at'=> now(),
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
