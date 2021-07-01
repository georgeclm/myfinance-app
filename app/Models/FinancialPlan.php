<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialPlan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function persen()
    {
        if ($this->jumlah == 0) {
            return 0;
        }
        return round($this->jumlah / $this->target * 100);
    }
    public function edit()
    {
        return [
            'Dana Darurat' => 'financialplan.editDanaDarurat',
            'Dana Membeli Barang' => 'financialplan.editDanaMembeliBarang'
        ][$this->produk] ?? 'financialplan.editDanaMenabung';
    }
}
