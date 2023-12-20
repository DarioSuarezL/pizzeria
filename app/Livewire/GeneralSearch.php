<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class GeneralSearch extends Component
{

    public $search;

    public function render()
    {
        return view('livewire.general-search');
    }

    public function find(){
        return redirect()->route('search.index', Str::upper($this->search));
    }
}
