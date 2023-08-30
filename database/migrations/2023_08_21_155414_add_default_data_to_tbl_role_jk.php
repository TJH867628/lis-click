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
        Schema::table('tbl_role_jk', function (Blueprint $table) {
            //
        });

        $roles = [
            ['name' => 'JK Pendaftaran', 'description' => 'JK Pendaftaran role'],
            ['name' => 'JK Reviewer', 'description' => 'JK Reviewer role'],
            ['name' => 'Super', 'description' => 'Super role'],
            ['name' => 'Reviewer', 'description' => 'Reviewer role'],
            ['name' => 'JK Bendahari', 'description' => 'JK Bendahari role']
        ];

        foreach ($roles as $role) {
            DB::table('tbl_role_jk')->insert([
                'roletype' => $role['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_role_jk', function (Blueprint $table) {
            //
        });

        // Remove the data from the table
        DB::table('tbl_role_jk')->whereIn('name', [
            'JK Pendaftaran',
            'JK Reviewer',
            'Super',
            'Reviewer',
            'JK Bendahari'
        ])->delete();
    }
};
