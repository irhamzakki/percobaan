<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'data_pasien';
    protected $primaryKey = 'Id_Pasien';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'Id_Pasien', 'Jenis_Pasien', 'Nm_Pasien', 'Tgl_Masuk',
        'Tmpt_Lahir', 'Tgl_lahir', 'Umur', 'JK', 'Alamat', 'Tlpn'
    ];
}
