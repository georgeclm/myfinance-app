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
        return $this->hasMany(Transaction::class)->where('user_id', auth()->id())->latest();
    }
    public function color()
    {
        return [
            '1' => 'bg-success',
            '2' => 'bg-danger',
            '3' => 'bg-primary',
            '4' => 'bg-warning',
            '5' => 'bg-info'
        ][$this->id];
    }
}
