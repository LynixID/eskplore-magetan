<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunAdmin extends Model
{
    use HasFactory;
    protected $table = "akun_admins";
    protected $primaryKey = "id_admin";
    protected $fillable = [
        'nama_lengkap', 'alamat_email', 'password', 'id_admin', 'captcha'];
}
