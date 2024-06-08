<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelanjaan extends Model
{
    protected $table = 'wisata_pembelanjaans';
    protected $guarded = [];
    use HasFactory;
}
