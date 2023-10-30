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
        Schema::table('tbl_submission', function (Blueprint $table) {
            //
            $table->boolean('withdraw')->after('publish')->nullable()->defaultValue(false);
            $table->string('withdraw_reason')->after('withdraw')->nullable()->defaultValue(null);
        });

        DB::table('tbl_role_jk')->insert([
            [
                'roletype' => 'JK Participants',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_submission', function (Blueprint $table) {
            //
            $table->dropColumn('withdraw');
            $table->dropColumn('withdraw_reason');
        });

        DB::table('tbl_role_jk')->where('roletype', 'JK Participants')->delete();
    }
};
