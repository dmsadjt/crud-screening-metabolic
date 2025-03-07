<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{

    protected $fillable = ['id', 'diagnosis_id', 'kategori', 'rekomendasi'];
    protected $table = 'rekomendasis';

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class, 'diagnosis_id');
    }
}
