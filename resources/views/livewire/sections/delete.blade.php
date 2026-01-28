<div>
    <span class="bg-white p-1 m-1 rounded-circle " style="top: 50%;
                                    left: 0;
                                    top: 0;
                                    position: absolute;">
                                <button wire:confirm="سيتم حذف هذا القسم "
                                        wire:click="delete({{$id}})"
                                        class="bg-transparent border-transparent  right fas text-lg text-danger   fa-trash"></button>
                            </span>
</div>
