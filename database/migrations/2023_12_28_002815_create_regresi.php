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
        Schema::create('regresi', function (Blueprint $table) {
            $table->id();
            $table->integer('negara_id');
            $table->string("tahun");
            $table->float("ekonomi");
            $table->float('kesehatan');
            $table->float('kebebasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regresi');
    }
};
