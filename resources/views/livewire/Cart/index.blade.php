<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col">

                <div class="table-responsive">
                    <table class="table">
                        {{-- @dd($data[9]['name']) --}}

                        <tbody class="bg-white border rounded">

                            @forelse($data as $product)
                                <tr wire:key='{{ $product['id'] }}'>

                                    <th scope="row">
                                        <div class="d-flex flex-lg-row flex-column align-items-center">
                                            <img src="{{ asset('uploads/' . $product['photo']) }}"
                                                class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2">{{ $product['name'] }}</p>
                                            </div>
                                        </div>
                                    </th>

                                    <td class="align-middle ">
                                        <div class="flex-row d-flex">
                                            <button wire:click='minus({{ $product['id'] }})' data-mdb-button-init
                                                data-mdb-ripple-init class="px-2 btn btn-link">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <p class="text-center form-control form-control-sm" style="width: 50px;">
                                                {{ $product['qnt'] ?? 1 }}</p>


                                            <button data-mdb-button-init data-mdb-ripple-init class="px-2 btn btn-link"
                                                wire:click='plus({{ $product['id'] }})'>
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>

                                    <td class="align-middle">
                                        <p class="mb-0" id="price" style="font-weight: 500;">
                                            {{ $product['price'] }}
                                        </p>

                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0" id="total" style="font-weight: 500;">
                                            {{ $product['price'] * $product['qnt'] ?? 1 }}
                                        </p>
                                    </td>
                                </tr>

                            @empty
                                <p class="text-danger">
                                    السلة
                                </p>
                            @endforelse

                        </tbody>


                    </table>
                </div>

                <div class="d-flex justify-content-end">

                    <div class="col-md-4">

                        <button wire:click="try" type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-block btn-lg">
                            <div class="d-flex justify-content-between">
                                <span>تأكيد الطلب
                                </span>
                                <button wire:click='pay'>pay</button>
                                <span id="totalPrice">{{ $total }}</span>
                            </div>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
