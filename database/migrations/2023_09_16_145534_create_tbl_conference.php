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
        Schema::create('tbl_conference', function (Blueprint $table) {
            $table->id();
            $table->string('field_id');
            $table->string('field_name');
            $table->string('field_value');
            $table->string('field_details');
            $table->string('field_visibility');
            $table->timestamps();
        });

        DB::table('tbl_conference')->insert([
            [
                'field_id' => 'PEJ-1',
                'field_name' => 'Publication E-Jurnal',
                'field_value' => 'LIS2015.pdf',
                'field_details' => 'LIS2015: Kelestarian Pendidikan Tanpa Sempadan',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'PEJ-2',
                'field_name' => 'Publication E-Jurnal',
                'field_value' => 'LIS 2016 Kota Batam.pdf',
                'field_details' => 'E-Jurnal LiS2016: Kelestarian Pendidikan Tanpa Sempadan',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'PEJ-3',
                'field_name' => 'Publication E-Jurnal',
                'field_value' => 'LIS2017.pdf',
                'field_details' => '	E-Jurnal LiS2017: Mewacanakan Kebitaraan Ilmu',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'PEJ-4',
                'field_name' => 'Publication E-Jurnal',
                'field_value' => 'Prosiding_LIS_e-_Jurnal_LIS_Liga_Ilmu_Serantau_2018.pdf',
                'field_details' => '	E-Jurnal LiS2018: Implementation of Competitive Research Toward Local Resources Based Industrialization',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'PEJ-5',
                'field_name' => 'Publication E-Jurnal',
                'field_value' => 'JILID 1 E-JURNAL LIS2019.pdf',
                'field_details' => 'E-Jurnal LiS2019 : Enriching The Creativity of Research and Innovation Towards The Industrial Revolution of IR4.0',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'PEJ-6',
                'field_name' => 'Publication E-Jurnal',
                'field_value' => 'Published LIS 2021 ISBN_eISSN.pdf',
                'field_details' => 'E-Jurnal LiS2021 : Empowering Research in The Pandemic Phase: Oppurtunies and Challenges',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'PEJ-7',
                'field_name' => 'Publication E-Jurnal',
                'field_value' => 'Edisi Khas LIS22.pdf',
                'field_details' => 'EDISI KHAS LIGA ILMU SERANTAU 2022',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
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
        Schema::dropIfExists('tbl_conference');
    }
};
