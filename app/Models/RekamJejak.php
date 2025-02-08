<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamJejak extends Model
{
    protected $table = 'rekam_jejaks';

    public function pasien() {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
}
