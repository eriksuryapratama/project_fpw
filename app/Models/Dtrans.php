<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtrans extends Model
{
    use HasFactory;

    protected $table = "dtrans";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'no_nota',
        'kode_pegawai',
        'subtotal',
    ];

    // RELATIONSHIP
    public function daftarPegawai2()
    {
        return $this->belongsTo(Pegawai::class,'kode_pegawai','kode_pegawai');
    }
}
