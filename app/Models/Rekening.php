<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'jenis_id', 'nama_akun', 'nama_bank', 'saldo_sekarang', 'saldo_mengendap', 'keterangan'];
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
