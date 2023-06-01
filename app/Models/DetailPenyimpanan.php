<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenyimpanan extends Model
{
    protected $table = 'detail_penyimpanan';
    protected $fillable = ['penyimpanan_id', 'detail_quisioner_id', 'jawaban'];

    public function penyimpanan()
    {
        return $this->belongsTo(Penyimpanan::class, 'penyimpanan_id');
    }

    public function detailQuisioner()
    {
        return $this->belongsTo(DetailQuisioner::class, 'detail_quisioner_id');
    }
}