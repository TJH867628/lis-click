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
            $table->renameColumn("paperLink", 'file_name');
            $table->removeColumn("posterLink");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_submission', function (Blueprint $table) {
            $table->renameColumn('file_name',"paperLink");
            $table->addColumn(str(),"posterLink");
        });
    }
};
