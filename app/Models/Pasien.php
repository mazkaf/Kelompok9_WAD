<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'nim',
        'nama',
        'tanggal_lahir',
        'no_telepon',
        'jenis_kelamin',
        'dokter_id',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}

