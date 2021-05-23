<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function userTransactionsByCategory()
    {
        return $this->hasMany(Transaction::class)->where('user_id', auth()->id());
    }
    public function bgColor()
    {
        return [
            '1' => 'bg-success',
            '2' => 'bg-warning',
            '3' => 'bg-info',
            '4' => 'bg-primary',
            '5' => 'bg-secondary',
            '6' => 'bg-danger'
        ][$this->id] ?? 'bg-info';
    }
    public function persen()
    {
        if (auth()->user()->uangkeluar() != 0) {
            return round($this->userTransactionsByCategory->sum('jumlah') / auth()->user()->uangkeluar() * 100);
        }
        return 0;
    }
}
