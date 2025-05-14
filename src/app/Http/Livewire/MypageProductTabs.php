<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MypageProductTabs extends Component
{
    public $activeTab = 'exhibitionList';

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }
    public function render()
    {
        return view('livewire.mypage-product-tabs');
    }
}
