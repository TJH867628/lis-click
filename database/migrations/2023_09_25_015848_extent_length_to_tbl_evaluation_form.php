<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbl_evaluation_form', function (Blueprint $table) {
            //
            $table->string('comments_abstract',1800)->change();
            $table->string('comments_introduction',1800)->change();
            $table->string('comments_methodology',1800)->change();
            $table->string('comments_literature_review',1800)->change();
            $table->string('comments_results',1800)->change();
            $table->string('comments_discussion',1800)->change();
            $table->string('comments_references',1800)->change();
            $table->string('specific_reject_reason',1800)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_evaluation_form', function (Blueprint $table) {
            //
            $table->string('comments_abstract',255)->change();
            $table->string('comments_introduction',255)->change();
            $table->string('comments_methodology',255)->change();
            $table->string('comments_literature_review',255)->change();
            $table->string('comments_results',255)->change();
            $table->string('comments_discussion',255)->change();
            $table->string('comments_references',255)->change();
            $table->string('specific_reject_reason',255)->change();

        });
    }
};
