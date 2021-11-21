<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = "pemesanan";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'kode_pemesanan',
        'nama_barang',
        'satuan_barang',
        'jumlah',
        'kode_supplier',
        'cek_kirim',
        'cek_terima',
    ];

    // RELATIONSHIP
    public function daftarSupplier()
    {
        return $this->belongsTo(Supplier::class,'kode_supplier','kode_supplier');
    }
}
