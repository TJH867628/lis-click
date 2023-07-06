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
        Schema::create('tbl_evaluation_form', function (Blueprint $table) {
            $table->id();
            $table->string('reviewer_name');
            $table->string('email');
            $table->string('paper_id_number');
            $table->string('title_of_paper_reviewed');
            $table->date('date_of_reviewed')->nullable();
            $table->string('comments_abstract')->nullable();
            $table->string('comments_introduction')->nullable();
            $table->string('comments_literature_review')->nullable();
            $table->string('comments_methodology')->nullable();
            $table->string('comments_results')->nullable();
            $table->string('comments_discussion')->nullable();
            $table->string('comments_references')->nullable();
            $table->integer('originality')->nullable();
            $table->integer('contribution_to_field')->nullable();
            $table->integer('technical_quality')->nullable();
            $table->integer('clarity_of_presentation')->nullable();
            $table->integer('depth_of_research')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('specific_reject_reason')->nullable();
            $table->string('additional_comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_evaluation_form');
    }
};
