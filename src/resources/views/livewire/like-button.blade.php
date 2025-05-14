<div>
    <button wire:click="toggleLike" class="{{ $isLiked ? 'liked-icon' : 'unliked-icon' }}">
        <i class="fa-star-toggle fas fa-star"></i> <span>{{ $likeCount }}</span>
    </button>
</div>