<div>
    <!-- タブボタン -->
    <div class="tabs">
        <button wire:click="setTab('exhibitionList')" class="{{ $activeTab === 'exhibitionList' ? 'active' : '' }}">出品した商品</button>
        <button wire:click="setTab('purchasedList')" class="{{ $activeTab === 'purchasedList' ? 'active' : '' }}">購入した商品</button>
    </div>

    <!-- コンテンツ切り替え -->
    @if ($activeTab === 'exhibitionList')
        <livewire:exhibition-list />
    @elseif ($activeTab === 'purchasedList')
        <livewire:purchased-list />
    @endif
</div>