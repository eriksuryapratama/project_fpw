<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrans extends Model
{
    use HasFactory;

    protected $table = "htrans";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'no_nota',
        'nama_barang',
        'satuan_barang',
        'harga_barang',
        'jumlah',
        'total',
    ];

    // RELATIONSHIP
    public function daftarDtrans()
    {
        return $this->belongsTo(Dtrans::class,'no_nota','no_nota');
    }
}
