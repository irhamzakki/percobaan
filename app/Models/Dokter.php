<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'data_dokter';
    protected $primaryKey = 'id_dokter';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_dokter',
        'nm_dokter',
        'JK',
        'status',
        'tgl_lahir',
        'tempat_lahir',
        'pendidikan',
        'Kode_Keahlian',
        'alamat',
    ];

    public function keahlian()
    {
        return $this->belongsTo(JenisKeahlian::class, 'Kode_Keahlian', 'Kode_keahlian');
    }
}
