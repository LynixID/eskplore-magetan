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
        Schema::create('titiklokasis', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->enum('jenis', ['Wisata ALam, Wisata Buatan']);
            $table->string("koordinat");
            $table->string("alamat");
            $table->string("waktu");
            $table->string("website");
            $table->string("penjelasan");
            $table->string("detil");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titiklokasis');
    }
};
