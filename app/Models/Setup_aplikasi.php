<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setup_aplikasi extends Model
{
    protected $table = 'aplikasi';
    protected $fillable = ['jumlah_hari_kerja'];
}
