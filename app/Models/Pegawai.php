<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Pegawai extends Authenticatable
{
    use HasFactory;

    protected $table = "pegawai";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'kode_pegawai',
        'nama_pegawai',
        'telepon',
        'username',
        'password'
    ];
}
