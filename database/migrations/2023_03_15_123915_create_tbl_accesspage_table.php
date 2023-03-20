<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_accesspage', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->string('adminID');
            $table->string('page1');
            $table->string('page2');
            $table->integer('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_accesspage');
    }
};
