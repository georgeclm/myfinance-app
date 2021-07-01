<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investation extends Model
{
    use HasFactory;

    public function gettotalAttribute()
    {
        if ($this->nama == 'Saham') {
            return auth()->user()->total_stocks();
        }
        return 0;
    }
}
