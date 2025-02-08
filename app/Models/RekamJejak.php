<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamJejak extends Model
{
    protected $table = 'rekam_jejaks';

    protected $fillable = [
        'pasien_id',
        'lingkar_pinggang',
        'trigliserida',
        'hdl',
        'sistolik',
        'diastolik',
        'gula',
        'diagnosa'
    ];

    public function pasien() {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
}
