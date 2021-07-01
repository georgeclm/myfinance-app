<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

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
        return $this->hasMany(Transaction::class)->where('user_id', auth()->id())->whereMonth('created_at', now()->month);
    }
    public function utangs()
    {
        return $this->hasMany(Utang::class)->where('user_id', auth()->id())->where('lunas', 0);
    }
    public function utangtemans()
    {
        return $this->hasMany(Utangteman::class)->where('user_id', auth()->id())->where('lunas', 0);
    }
    public function financialplans()
    {
        return $this->hasMany(FinancialPlan::class)->where('user_id', auth()->id());
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class)->where('user_id', auth()->id())->latest();
    }
    public function total_stocks()
    {
        return $this->stocks()->sum('total');
    }
    public function uangmasuk()
    {
        if (request()->has('q')) {
            return (request()->q == 1)
                ? $this->hasMany(Transaction::class)->whereMonth('created_at', now()->subMonth()->month)->where('user_id', auth()->id())->where('jenisuang_id', 1)->sum('jumlah')
                : $this->hasMany(Transaction::class)->where('user_id', auth()->id())->where('jenisuang_id', 1)->sum('jumlah');
        }
        return $this->hasMany(Transaction::class)->whereMonth('created_at', now()->month)->where('user_id', auth()->id())->where('jenisuang_id', 1)->sum('jumlah');
    }
    public function uangkeluar()
    {
        if (request()->has('q')) {
            return (request()->q == 1)
                ? $this->hasMany(Transaction::class)->whereMonth('created_at', now()->subMonth()->month)->where('user_id', auth()->id())->where('jenisuang_id', 2)->sum('jumlah')
                : $this->hasMany(Transaction::class)->where('user_id', auth()->id())->where('jenisuang_id', 2)->sum('jumlah');
        }
        return $this->hasMany(Transaction::class)->whereMonth('created_at', now()->month)->where('user_id', auth()->id())->where('jenisuang_id', 2)->sum('jumlah');
    }
    public function saldoperbulan()
    {
        return $this->uangmasuk() - $this->uangkeluar();
    }
    public function saldo()
    {
        return $this->rekenings()->sum('saldo_sekarang') - $this->saldoMengendap();
    }
    public function saldoMengendap()
    {
        return $this->rekenings()->sum('saldo_mengendap');
    }
    public function totalutang()
    {
        return $this->utangs()->sum('jumlah');
    }
    public function totalutangteman()
    {
        return $this->utangtemans()->sum('jumlah');
    }
    public function uang()
    {
        return $this->saldo() - $this->totalutang() + $this->totalutangteman();
    }
}
