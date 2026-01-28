<div>
    <div class="container">

        <div class="card">


            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    @if ($data && count($data) > 0)
                        <thead>
                            <tr>
                                <th width="10px">صورة</th>
                                @can('section.create')
                                    <th>
                                        <a href="{{ route('banares.create') }}" class="btn btn-success btn-sm"> إضافة جديد
                                            +</a>
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                    @endif

                    <tbody>
                        @forelse($data as $banar)
                            <tr>



                                <td>
                                    <a href="{{ route('banares.edit', $banar->id) }}">

                                        <span class="text-black p-1 rounded-circle">

                                            <img width="300" height="300"
                                                src="{{ asset('uploads/' . $banar->path) }}" alt="Card image cap">


                                        </span>
                                    </a>



                                    <a href="{{ route('banares.show', $banar->id) }}">

                                        <span class=" text-info p-1 rounded-circle">
                                            <i class="right fas bg-transparent text-lg fa-eye"></i>
                                        </span>
                                    </a>
                                    @can('banares.delete')
                                        <span class=" rounded-circle  ">
                                            <button wire:confirm="سيتم حذف هذا القسم "
                                                wire:click="delete({{ $banar->id }})"
                                                class="bg-transparent border-transparent  right fas text-lg text-danger   fa-trash"></button>
                                        </span>
                                    @endcan
                                </td>
                                <td>

                                </td>
                            </tr>

                        @empty
                            <div class="d-flex col-sm-12 justify-content-center  flex-column">

                                <div class="d-flex  justify-content-center mb-3 mt-5 align-items-center">

                                    <div class="text-danger pl-1">لا يوجد اعلانات مرفوعه حاليا</div>
                                    <img width="50" src="{{ asset('admin/photo/seo.png') }}">
                                </div>
                                <button type="button" class="btn btn-primary"><a class="text-light"
                                        href="{{ route('banares.create') }}">اضافة</a>
                                </button>
                            </div>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>






    </div>
</div>
