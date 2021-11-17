<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kode_kategori',
        'satuan_barang',
        'stok_barang',
        'harga_barang'
    ];

    // RELATIONSHIP
    public function daftarkategori()
    {
        return $this->belongsTo(Kategori::class,'kode_kategori','kode_kategori');
    }
}
