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
                'pageName' => 'Participants HomePage',
                'pagePath' => 'page.participants.homePage.homePage(Participants)',
                'pageType' => 'participants',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Page List',
                'pagePath' => 'page.superadmin.pageList.pageList(superAdmin)',
                'pageType' => 'superAdmin',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Conferences Info',
                'pagePath' => 'page.participants.conferencesInfo.conferencesInfoContent',
                'pageType' => 'participants',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK Pendaftaran Home Page',
                'pagePath' => 'page.JK_Pendaftaran.homePage(JK_Pendaftaran).homePageContent',
                'pageType' => 'participants',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK Reviewer Home Page',
                'pagePath' => 'page.Jk_Reviewer.homePage(Jk_Reviewer).homePageContent',
                'pageType' => 'JK Reviewer',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK Reviewer Reviewer List Page',
                'pagePath' => 'page.Jk_Reviewer.reviewerList.reviewListContent',
                'pageType' => 'JK Reviewer',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Participants Full Paper Submission Page',
                'pagePath' => 'page.participants.fullpaperSubmission.fullpaperContent',
                'pageType' => 'participants',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Participants Submission Status Page',
                'pagePath' => 'page.participants.submissionstatus(participants).submissionStatusContent',
                'pageType' => 'participants',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Super Admin Submission Status Page',
                'pagePath' => 'page.superadmin.submissionstatus(SuperAdmin).submissionStatusContent',
                'pageType' => 'superAdmin',
                'createdAt' => now(),
                'updatedAt' => now(),
            ],

            
            //template
            [
                'pageName' => "//pagename",
                'pagePath' => "//pagePath example:'page.participants.conferencesInfo.conferencesInfoContent'",
                'pageType' => "this page is for which role of user",
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
