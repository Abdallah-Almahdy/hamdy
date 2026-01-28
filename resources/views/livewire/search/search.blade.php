<div>

    <div>
        <div class="input-group ">
            <input wire:keydown='makeSearch' wire:model='searchText' style="border: 0px" type="search"
                placeholder="بحث عن منتج" class=" form-control" />
            <button data-toggle="modal" data-target="#modal-default" class="bg-white btn">
                <i class="fa fa-search"></i>
            </button>
        </div>


    </div>


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> نتائج البحث</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center">
                            @if ($data)

                                @forelse($data as $product)
                                    <div class="card m-3 p-2 text-center d-flex justify-content-center align-items-center"
                                        style="width: 150px;height:200px">
                                        <a href="{{ route('clientShowProductPage', $product->id) }}">

                                            <img src="{{ asset('uploads/' . $product->photo) }}"
                                                alt="{{ $product->name }}" height="100">
                                        </a>
                                        <p>

                                            {{ $product->price }}
                                        </p>
                                        <h4>
                                            {{ $product->name }}

                                        </h4>
                                    </div>

                                @empty
                                    <div class="d-flex col-sm-12 justify-content-center  ">

                                        <div
                                            class="d-flex flex-column  justify-content-center mb-3 mt-5 align-items-center">

                                            <img width="50" src="{{ asset('admin/photo/seo.png') }}">
                                            <div class="text-alert text-lg m-3 pl-1">عفوا لم يتم إيجاد منتجات</div>
                                        </div>

                                    </div>
                                @endforelse
                            @endif

                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
