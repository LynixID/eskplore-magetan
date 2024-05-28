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
            $table->string('nama_depan', 20);
            $table->string('nama_belakang', 20);
            $table->string('alamat_email', 50)->unique;
            $table->string('password', 20);
            $table->string('id_admin', 11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_admins');
    }
};
