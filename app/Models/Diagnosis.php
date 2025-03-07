<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{

    protected $fillable = ['id', 'keterangan', 'deskripsi'];
    protected $table = 'diagnoses';

    public function rekamMedis()
    {
        return $this->hasMany(RekamJejak::class, 'diagnosa');
    }
}
