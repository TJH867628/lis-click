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
        Schema::create('tbl_participants_info', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->string('participantsID')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('IC_No');
            $table->string('name',500);
            $table->string('title');
            $table->string('phoneNumber');
            $table->string('organizationAddress');
            $table->string('postcode');
            $table->string('nation');
            $table->timestamp('dateOfRegister');
            $table->string('participantsCategory');
            $table->integer('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
            $table->timestamps();

            $table->foreign('email')->references('email')->on('tbl_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_participants_info');
    }
};
