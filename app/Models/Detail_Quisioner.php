<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Quisioner extends Model
{
    use HasFactory;
    protected $table = 'detail_quisioner';
    protected $fillable = ['quisioner_id', 'pertanyaan'];


    public function quisioner()
    {
        return $this->belongsTo(Quisioner::class);
    }
}