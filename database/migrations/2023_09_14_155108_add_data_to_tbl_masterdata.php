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

        });

        DB::table('tbl_masterdata')->insert([
            [
                'masterdata_name' => 'Publication E-Jurnal',
                'masterdata_value' => 'LIS2015.pdf',
                'masterdata_details' => 'LIS2015: Kelestarian Pendidikan Tanpa Sempadan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'masterdata_name' => 'Publication E-Jurnal',
                'masterdata_value' => 'LIS 2016 Kota Batam.pdf',
                'masterdata_details' => 'E-Jurnal LiS2016: Kelestarian Pendidikan Tanpa Sempadan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'masterdata_name' => 'Publication E-Jurnal',
                'masterdata_value' => 'LIS2017.pdf',
                'masterdata_details' => '	E-Jurnal LiS2017: Mewacanakan Kebitaraan Ilmu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'masterdata_name' => 'Publication E-Jurnal',
                'masterdata_value' => 'Prosiding_LIS_e-_Jurnal_LIS_Liga_Ilmu_Serantau_2018.pdf',
                'masterdata_details' => '	E-Jurnal LiS2018: Implementation of Competitive Research Toward Local Resources Based Industrialization',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'masterdata_name' => 'Publication E-Jurnal',
                'masterdata_value' => 'JILID 1 E-JURNAL LIS2019.pdf',
                'masterdata_details' => 'E-Jurnal LiS2019 : Enriching The Creativity of Research and Innovation Towards The Industrial Revolution of IR4.0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'masterdata_name' => 'Publication E-Jurnal',
                'masterdata_value' => 'Published LIS 2021 ISBN_eISSN.pdf',
                'masterdata_details' => 'E-Jurnal LiS2021 : Empowering Research in The Pandemic Phase: Oppurtunies and Challenges',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'masterdata_name' => 'Publication E-Jurnal',
                'masterdata_value' => 'Edisi Khas LIS22.pdf',
                'masterdata_details' => 'EDISI KHAS LIGA ILMU SERANTAU 2022',
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
