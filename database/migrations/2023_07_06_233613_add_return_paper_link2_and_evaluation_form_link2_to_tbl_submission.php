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
        Schema::table('tbl_submission', function (Blueprint $table) {
            $table->string('returnPaperLink2')->after('returnPaperLink')->nullable();
            $table->string('evaluationFormLink2')->after('evaluationFormLink')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_submission', function (Blueprint $table) {
            $table->removeColumn('returnPaperLink2');
            $table->removeColumn('evaluationFormLink2');
        });
    }
};
