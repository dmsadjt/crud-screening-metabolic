<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pasien extends Model
{

    protected $fillable =['id', 'nama', 'jenis_kelamin','nik'];
    protected $table = 'pasiens';

    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // Use string instead of integer

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid(); // Generate UUID automatically
        });
    }

    public function rekamMedis() {
        return $this->hasMany(RekamJejak::class);
    }
}
