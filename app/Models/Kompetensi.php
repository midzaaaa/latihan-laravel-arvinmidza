<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    use HasFactory;
    public function siswa()
{
    return $this->belongsToMany(
        Siswa::class,
        'siswa_kompetensi'
    )->withPivot('nilai');
}
}
