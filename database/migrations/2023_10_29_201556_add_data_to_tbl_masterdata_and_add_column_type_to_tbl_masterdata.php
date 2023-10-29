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
            $table->string('masterdata_type')->nullable()->defaultValue('system')->after('masterdata_details');
        });

        DB::table('tbl_masterdata')->insert([
            [
                'masterdata_name' => 'emailLogo',
                'masterdata_value' => '/images/LOGO FB.png',
                'masterdata_details' => 'Logo for system email',
                'masterdata_type' => 'website_logo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'masterdata_name' => 'navigationBarLogo',
                'masterdata_value' => '/images/Logo1 (1).png',
                'masterdata_details' => 'Logo for navigation bar',
                'masterdata_type' => 'website_logo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'masterdata_name' => 'websiteFavicon',
                'masterdata_value' => '/images/Logo_Title.png',
                'masterdata_details' => 'Favicon for the website',
                'masterdata_type' => 'website_logo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('tbl_page')->insert([
            [
                'pageName' => 'Website Logo',
                'pagePath' => 'page.superadmin.editWebsiteLogo.editWebsiteLogo',
                'pageType' => 'logo',
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
        Schema::table('tbl_masterdata', function (Blueprint $table) {
            //
            $table->dropColumn('masterdata_type');
        });
        
        DB::table('tbl_masterdata')->where('masterdata_name', 'emailLogo')->delete();
        DB::table('tbl_masterdata')->where('masterdata_name', 'navigationBarLogo')->delete();
        DB::table('tbl_masterdata')->where('masterdata_name', 'websiteFavicon')->delete();
        DB::table('tbl_page')->where('pageName', 'Website Logo')->delete();
    }
};
