<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyimpanan extends Model
{
    use HasFactory;
    protected $table = 'penyimpanan';

    protected $fillable = [

        'daerah',
        'nama',
        'alamat',
        'umur',
        'no_telepon',
        'posisi_id',
        'perusahaan_id',
        'tanggal'
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }

    public function posisi()
    {
        return $this->belongsTo(Posisi::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function detailPenyimpanan()
    {
        return $this->hasMany(DetailPenyimpanan::class);
    }
}