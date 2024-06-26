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
        Schema::create('akun_admins', function (Blueprint $table) {
            $table->string('nama_lengkap', 50);
            $table->string('alamat_email', 20);
            $table->string('password', 100);
            $table->unsignedBigInteger('id_admin'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_admins');
        Schema::table('akun_admins', function (Blueprint $table) {
            $table->dropColumn('id_admin');
        });
    }
};
