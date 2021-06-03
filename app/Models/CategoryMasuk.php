<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMasuk extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];
    public function userTransactionsByCategory()
    {
        return $this->hasMany(Transaction::class)->whereMonth('created_at', now()->month)->where('user_id', auth()->id());
    }
    public function bgColor()
    {
        return [
            '1' => 'bg-success',
            '2' => 'bg-warning',
            '3' => 'bg-info',
            '4' => 'bg-primary',
        ][$this->id] ?? 'bg-info';
    }
    public function icon()
    {
        return [
            '1' => 'fa-briefcase',
            '2' => 'fa-money-check-alt',
            '3' => 'fa-chart-line',
            '4' => 'fa-city',
        ][$this->id] ?? 'fa-random';
    }
    public function persen()
    {
        if (auth()->user()->uangmasuk() != 0) {
            return round($this->userTransactionsByCategory->sum('jumlah') / auth()->user()->uangmasuk() * 100);
        }
        return 0;
    }
}
