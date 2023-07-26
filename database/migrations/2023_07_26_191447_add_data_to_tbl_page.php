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
            
        });

        DB::table('tbl_page')->insert([
            [
                'pageName' => 'Gallery',
                'pagePath' => 'page.visitor.gallery.galleryContent',
                'pageType' => 'visitor',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
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
