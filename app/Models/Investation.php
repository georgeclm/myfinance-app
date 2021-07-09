<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investation extends Model
{
    use HasFactory;

    public function gettotalAttribute()
    {
        return [
            'Saham' => auth()->user()->total_stocks(),
            'P2P' => auth()->user()->total_p2ps()
        ][$this->nama] ?? 0;
    }

    public function route()
    {
        return [
            'Saham' => 'stocks',
            'P2P' => 'p2ps'
        ][$this->nama] ?? 'stocks';
    }
}
