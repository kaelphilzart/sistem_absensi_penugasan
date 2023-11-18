<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Penjualan;

class PenjualanIndex extends Component
{
    public function render () {
        return view('livewire.penjualan-index',[
            'penjualan' =>$this->search === null?
            Penjualan::latest()->paginate($this->paginate) :
            penjualan::latest()->where('nama','like','%'.$this->search.'%')->paginate($this->paginate)

        ]);

    }
}
