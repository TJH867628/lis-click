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
        Schema::table('tbl_page', function (Blueprint $table) {
            //
        });

        DB::table('tbl_page')->insert([
            [
                'pageName' => 'Official Contact Details',
                'pagePath' => 'Official Contact Details',
                'pageType' => 'Official Contact Details',
                'editable' => 1,
                'createdAt' => now(),
                'updatedAt'=> now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_page', function (Blueprint $table) {
            //
        });
    }
};
