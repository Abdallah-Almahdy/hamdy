<div>
    <span wire:poll.2s="updateOrderCount" class="badge badge-pill badge-danger">
        {{ $orderCount }}
    </span>
</div>


<script>
    // Listen for the "play-sound" event from Livewire and play the sound
    Livewire.on('play-sound', () => {
        const audio = new Audio('{{ asset('admin/audio/Ordernotification.mp3') }}');
        audio.play().catch(error => console.error('Error playing sound:', error));
    });
</script>
