<div class="mt-4">

    <button wire:click="addToCart(2)" class="btn  btn-primary btn-lg btn-flat">
        <i class="fas fa-cart-plus fa-lg mr-2"></i>
        اضف للسلة


    </button>
    @session('done')
        <p class="alert alert-success mt-4"> للسلة تمت الأضافة</p>
    @endsession
</div>
