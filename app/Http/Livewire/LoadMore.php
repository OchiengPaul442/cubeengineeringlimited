<?php

namespace App\Http\Livewire;

use App\Models\service;
use Livewire\Component;
use Livewire\WithPagination;

class LoadMore extends Component
{
    use WithPagination;
    
    public $page_number = 4;
    // load
    public function loadmore()
    {
        // DD('IT WORKS');
        $this->page_number += 4;
    }
    // loadless
    public function loadless()
    {
        $this->page_number -= 4;
    }
    public function render()
    {
        $services = service::orderBy('id', 'ASC')->paginate($this->page_number);
        return view('livewire.load-more', ['services' => $services]);
    }
}
