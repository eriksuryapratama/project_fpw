<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;

    protected $table = "retur";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'kode_retur',
        'nama_barang',
        'satuan_barang',
        'jumlah',
        'kode_supplier',
        'kode_pegawai',
        'alasan',
    ];

    // RELATIONSHIP DENGAN SUPPLIER
    public function daftarSupplier()
    {
        return $this->belongsTo(Supplier::class,'kode_supplier','kode_supplier');
    }

    // RELATIONSHIP DENGAN PEGAWAI
    public function daftarPegawai()
    {
        return $this->belongsTo(Pegawai::class,'kode_pegawai','kode_pegawai');
    }
}
