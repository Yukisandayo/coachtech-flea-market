<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductTabs extends Component
{
    public $activeTab = 'list';

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }
    public function render()
    {
        return view('livewire.product-tabs');
    }
}
