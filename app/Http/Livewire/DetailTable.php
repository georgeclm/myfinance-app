<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class DetailTable extends Component
{
    public $jenisuang;
    public $categories;
    public $search = 0;
    public $search2 = 0;
    public $q = 0;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {

        if ($this->search) {
            $transactions = $this->jenisuang->user_transactions->where('category_id', $this->search);
        } else if ($this->search2) {
            $transactions = $this->jenisuang->user_transactions->where('category_masuk_id', $this->search2);
        } else {
            $transactions = $this->jenisuang->user_transactions;
        }

        return view('livewire.detail-table', compact('transactions'));
    }
}
