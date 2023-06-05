<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Quisioner extends Model
{
    use HasFactory;
    protected $table = 'detail_quisioner';

    protected $fillable = [
        'pertanyaan',
        'jenis_quisoner_id',
        'quisioner_id',
    ];

    public function jenisQuisioner()
    {
        return $this->belongsTo(JenisQuisioner::class, 'jenis_quisioner_id');
    }

    public function quisioner()
    {
        return $this->belongsTo(Quisioner::class, 'quisioner_id');
    }
}