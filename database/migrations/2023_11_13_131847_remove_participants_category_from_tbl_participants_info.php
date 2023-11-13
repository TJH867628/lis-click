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
        Schema::table('tbl_participants_info', function (Blueprint $table) {
            //
            $table->dropColumn('participantsCategory');
        });

        Schema::table('tbl_payment', function (Blueprint $table) {
            //
            $table->string('participantsEmail')->nullable()->after('paymentID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_participants_info', function (Blueprint $table) {
            //
            $table->string('participantsCategory');
        });

        Schema::table('tbl_payment', function (Blueprint $table) {
            //
            $table->dropColumn('participantsEmail');
        });
    }
};
