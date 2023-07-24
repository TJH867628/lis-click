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
        DB::table('tbl_page')->delete();

        DB::table('tbl_page')->insert([
            [
                'pageName' => 'Participants HomePage',
                'pagePath' => 'page.participants.homePage.homePageContent',
                'pageType' => 'participants',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Page List',
                'pagePath' => 'page.superadmin.pageList.pageList(superAdmin)',
                'pageType' => 'superAdmin',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Conferences Info',
                'pagePath' => 'page.participants.conferencesInfo.conferencesInfoContent',
                'pageType' => 'participants',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK Pendaftaran Home Page',
                'pagePath' => 'page.JK_Pendaftaran.homePage(JK_Pendaftaran).homePageContent',
                'pageType' => 'participants',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK Reviewer Home Page',
                'pagePath' => 'page.Jk_Reviewer.homePage(Jk_Reviewer).homePageContent',
                'pageType' => 'JK Reviewer',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK Reviewer Reviewer List Page',
                'pagePath' => 'page.Jk_Reviewer.reviewerList.reviewListContent',
                'pageType' => 'JK Reviewer',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Participants Full Paper Submission Page',
                'pagePath' => 'page.participants.fullpaperSubmission.fullpaperContent',
                'pageType' => 'participants',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Participants Submission Status Page',
                'pagePath' => 'page.participants.submissionstatus(participants).submissionStatusContent',
                'pageType' => 'participants',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Super Admin Submission Status Page',
                'pagePath' => 'page.superadmin.submissionstatus(SuperAdmin).submissionStatusContent',
                'pageType' => 'superAdmin',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Reviewer Home Page',
                'pagePath' => 'page.reviewer.homePage(Reviewer).homePageContent',
                'pageType' => 'reviewer',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Reviewer Pending Review Page',
                'pagePath' => 'page.reviewer.pendingreview.pendingreviewContent',
                'pageType' => 'reviewer',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Reviewer Done Review Page',
                'pagePath' => 'page.reviewer.donereview.donereviewContent',
                'pageType' => 'reviewer',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Super Admin Admin List Page',
                'pagePath' => 'page.superadmin.adminList.adminListContent',
                'pageType' => 'superAdmin',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK Participant Participant List Page',
                'pagePath' => 'page.JK_Participant.participantList.participantListContent',
                'pageType' => 'JK Participant',
                'editable' => false,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK Participant Home Page',
                'pagePath' => 'page.JK_Participant.homePage(JK_Participant).homePageContent',
                'pageType' => 'JK Participant',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'footer',
                'pagePath' => 'page.footer',
                'pageType' => 'JK Participant',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK_Participant Navigation Bar',
                'pagePath' => 'page.JK_Participant.navigationBar',
                'pageType' => 'JK Participant',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK_Pendaftaran Navigation Bar',
                'pagePath' => 'page.JK_Pendaftaran.navigationBar',
                'pageType' => 'JK Pendaftaran',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Jk_Reviewer Navigation Bar',
                'pagePath' => 'page.Jk_Reviewer.navigationBar',
                'pageType' => 'JK Reviewer',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'JK_Participant Navigation Bar',
                'pagePath' => 'page.JK_Participant.navigationBar',
                'pageType' => 'JK Participant',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Participants Navigation Bar',
                'pagePath' => 'page.participants.navigationBar',
                'pageType' => 'Participants',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Reviewer Navigation Bar',
                'pagePath' => 'page.reviewer.navigationBar',
                'pageType' => 'Reviewer',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],
            [
                'pageName' => 'Visitor Navigation Bar',
                'pagePath' => 'page.visitor.navigationBar',
                'pageType' => 'Visitor',
                'editable' => true,
                'createdAt' => now(),
                'updatedAt' => now(),
            ],

            
            //template
            // [
            //     'pageName' => "//pagename",
            //     'pagePath' => "//pagePath example:'page.participants.conferencesInfo.conferencesInfoContent'",
            //     'pageType' => "this page is for which role of user",
            //'editable' => true/false,
            //     'createdAt' => now(),
            //     'updatedAt' => now(),
            // ],
            // Add more data as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('tbl_page')->delete();
    }
};
