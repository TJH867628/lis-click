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
        DB::table('tbl_page')->insert([
            [
                'pageName' => 'participantsHomePage',
                'pagePath' => 'page.participants.homePage.homePage(Participants)',
                'pageType' => 'participants',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'pageList',
                'pagePath' => 'page.superadmin.pageList.pageList(superAdmin)',
                'pageType' => 'superAdmin',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            // Add more data as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_paage', function (Blueprint $table) {
            //
        });
    }
};
