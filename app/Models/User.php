<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function rekenings()
    {
        return $this->hasMany(Rekening::class)->where('user_id', auth()->id());
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class)->where('user_id', auth()->id());
    }
    public function utangs()
    {
        return $this->hasMany(Utang::class)->where('user_id', auth()->id());
    }
    public function uangmasuk()
    {
        return $this->transactions->where('created_at', '>=', now()->subMonth())->where('jenisuang_id', 1)->sum('jumlah');
    }
    public function uangkeluar()
    {
        return $this->transactions->where('created_at', '>=', now()->subMonth())->where('jenisuang_id', 2)->sum('jumlah');
    }
    public function saldoperbulan()
    {
        return $this->uangmasuk() - $this->uangkeluar();
    }
    public function saldo()
    {
        return $this->rekenings()->sum('saldo_sekarang');
    }
    public function totalutang()
    {
        return $this->utangs()->sum('jumlah');
    }
    public function uang()
    {
        return $this->saldo() - $this->totalutang();
    }
}
