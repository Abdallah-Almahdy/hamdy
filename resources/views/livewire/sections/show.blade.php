<div>
    <div class="container">
        <div class="row ">

            @forelse($data as $product)
                <div wire:key="{{ $product->id }}" class="card" style="width: 10rem;">

                    <span class=" bg-white rounded-circle  p-1 m-1  "
                        style="top: 50%;
                                    left: 0;
                                    top: 0;
                                    position: absolute;">
                        <button wire:confirm="سيتم حذف هذا المنتج " wire:click="delete({{ $product->id }})"
                            style="border: none;
                                        outline: none"
                            class="bg-transparent border-transparent  right fas text-lg text-danger   fa-trash"></button>
                    </span>

                    <img class="card-img-top" width="200" height="200"
                        src="{{ asset('uploads/' . $product->photo) }}" alt="Card image cap">

                    <a href="{{ route('products.edit', $product->id) }}">

                        <span class="bg-white p-1 rounded-circle"
                            style="
                                    left: 80%;
                                    top: 60%;
                                    position: absolute;">
                            <i class="right fas text-lg  fa-pen"></i>
                        </span>
                    </a>

                    <a href="">

                        <span class="bg-white p-1 rounded-circle"
                            style="
                                left: 2%;
                                top: 60%;
                                position: absolute;">
                            <i class="right fas bg-transparent text-lg fa-eye"></i>
                        </span>
                    </a>

                    <p class="p-0 mb-1 text-center">
                        {{ $product->name }}

                    </p>


                </div>

            @empty
                <div class="d-flex col-sm-12 justify-content-center  flex-column">

                    <div class="d-flex  justify-content-center mb-3 mt-5 align-items-center">

                        <div class="text-danger pl-1">لا يوجد منتجات</div>
                        <img width="50" src="{{ asset('admin/photo/seo.png') }}">
                    </div>
                    <button type="button" class="btn btn-primary"><a class="text-light"
                            href="{{ route('products.create') }}">اضافة</a>
                    </button>
                </div>
            @endforelse

        </div>

    </div>
</div>
