<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'tanggal_mulai_pkl',
        'tanggal_selesai_pkl',
        'perusahaan_id',
    ];

    public function kompetensi()
    {
        return $this->belongsToMany(
            Kompetensi::class,
            'siswa_kompetensi'
        )->withPivot('nilai');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}