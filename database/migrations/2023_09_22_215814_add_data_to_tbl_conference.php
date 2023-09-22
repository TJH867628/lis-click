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
        Schema::table('tbl_conference', function (Blueprint $table) {

        });

        DB::table('tbl_conference')->insert([
            [
                'field_id' => 'COND-1',
                'field_name' => 'Conferences Download',
                'field_value' => 'LIS 2023 AUTHORs GUIDELINE.docx',
                'field_details' => 'LIS 2023 Author Guideline',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'COND-2',
                'field_name' => 'Conferences Download',
                'field_value' => 'LIS2023_FULL-PAPER-TEMPLATE.docx',
                'field_details' => 'LIS 2023 Full Paper Template',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'COND-3',
                'field_name' => 'Conferences Download',
                'field_value' => 'LIS2023_ABSTRACT-TEMPLATE.docx',
                'field_details' => 'LIS 2023 Abstract Template',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'COND-4',
                'field_name' => 'Conferences Download',
                'field_value' => 'LIS 2023 POSTER PRESENTATION GUIDELINE.docx',
                'field_details' => 'LIS 2023 Poster Guideline',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'COND-5',
                'field_name' => 'Conferences Download',
                'field_value' => 'LIS 2023 poster presentation template.pptx',
                'field_details' => 'LIS 2023 Poster Template',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONFEES-1',
                'field_name' => 'Conferences Fees',
                'field_value' => 'RM 300 / USD 70',
                'field_details' => 'Presentation & Publication',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONFEES-2',
                'field_name' => 'Conferences Fees',
                'field_value' => 'RM 250 / USD 60',
                'field_details' => 'Poster / Paper Presentation',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONFEES-3',
                'field_name' => 'Conferences Fees',
                'field_value' => 'RM 250 / USD 60',
                'field_details' => 'Publication Only',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONFEES-4',
                'field_name' => 'Conferences Fees',
                'field_value' => 'RM 250 / USD 60',
                'field_details' => 'Participant / Audience',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONFEES-5',
                'field_name' => 'Conferences Fees',
                'field_value' => 'RM 250 / USD 60',
                'field_details' => 'Student Presenter',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONDATES-1',
                'field_name' => 'Conferences Dates',
                'field_value' => '12 Mac - 30 April 2023',
                'field_details' => 'Registration & Abstract Submission',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONDATES-2',
                'field_name' => 'Conferences Dates',
                'field_value' => '15 June 2023',
                'field_details' => 'Full Paper Submission Deadline',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONDATES-3',
                'field_name' => 'Conferences Dates',
                'field_value' => '6 July 2023',
                'field_details' => 'Acceptance of Payment Deadline',
                'field_visibility' => '1', // 1 = 'visible', 0 = 'hidden
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'field_id' => 'CONDATES-4',
                'field_name' => 'Conferences Dates',
                'field_value' => '8 August 2023',
                'field_details' => 'Conference Date',
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
        Schema::table('tbl_conference', function (Blueprint $table) {
            //
        });
    }
};
