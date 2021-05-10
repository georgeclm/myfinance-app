<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function jenisuang()
    {
        return $this->belongsTo(Jenisuang::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'rekening_id');
    }
    public function rekening_tujuan()
    {
        return $this->belongsTo(Rekening::class, 'rekening_id2');
    }
    public function utang()
    {
        return $this->belongsTo(Utang::class);
    }
}
