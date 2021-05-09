<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisuang extends Model
{
    use HasFactory;
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function user_transactions()
    {
        return $this->hasMany(Transaction::class)->where('user_id', auth()->id());
    }
}
