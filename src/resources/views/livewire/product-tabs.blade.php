<div>
    <!-- タブボタン -->
    <div class="tabs">
        <button wire:click="setTab('list')" class="{{ $activeTab === 'list' ? 'active' : '' }}">おすすめ</button>
        <button wire:click="setTab('mylist')" class="{{ $activeTab === 'mylist' ? 'active' : '' }}">マイリスト</button>
    </div>
    <div class="border"></div>

    <!-- コンテンツ切り替え -->
    @if ($activeTab === 'list')
        <livewire:product-list />
    @elseif ($activeTab === 'mylist')
        <livewire:mylist />
    @endif
</div>