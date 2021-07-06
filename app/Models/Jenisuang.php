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
    public function cicilans()
    {
        return $this->hasMany(Cicilan::class)->where('user_id', auth()->id());
    }
    public function user_transactions()
    {
        function relax()
        {;
        }
        $return = $this->hasMany(Transaction::class)->where('user_id', auth()->id());
        if (request()->has('q') && request()->q == 1) {
            $return =  $return->whereMonth('created_at', now()->subMonth()->month);
        } else if (request()->has('q') && request()->q == 2) {
            relax();
        } else if (session('q')) {
            if (session('q') == 1) {
                $return =  $return->whereMonth('created_at', now()->subMonth()->month);
            } else if (session('q') == 2) {
                relax();
            } else {
                $return =  $return->whereMonth('created_at', now()->month);
            }
        } else {
            $return =  $return->whereMonth('created_at', now()->month);
        }
        if (request()->has('daterange')) {
            $date_range1 = explode(" / ", request()->daterange);
            $return = $return->where('created_at', '>=', $date_range1[0]);
            $return = $return->where('created_at', '<=', $date_range1[1]);
        }
        return $return->latest();
    }

    public function color()
    {
        return [
            '1' => 'bg-success',
            '2' => 'bg-danger',
            '3' => 'bg-primary',
            '4' => 'bg-warning',
            '5' => 'bg-info'
        ][$this->id] ?? 'bg-danger';
    }
    public function textColor()
    {
        return [
            '1' => 'text-success',
            '2' => 'text-danger',
            '3' => 'text-primary',
            '4' => 'text-warning',
            '5' => 'text-info'
        ][$this->id] ?? 'text-danger';
    }
    public function categoriesTotal()
    {
        return $this->user_transactions->sum('jumlah');
    }
    public function categoryTotal($q)
    {
        return $this->user_transactions->where('category_id', $q)->sum('jumlah');
    }
    public function categoryMasuksTotal()
    {
        return $this->user_transactions->sum('jumlah');
    }
    public function categoryMasukTotal($q)
    {
        return $this->user_transactions->where('category_masuk_id', $q)->sum('jumlah');
    }
}
