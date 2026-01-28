<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <!-- Card Header with Title -->
        <div class="card-header d-flex justify-content-between align-items-center">
            @can('section.create')
                <a href="{{ route('banares.create') }}" class="btn btn-outline-success  btn-sm">
                    إضافة جديد +
                </a>
            @endcan
        </div>

        <!-- Card Body: Table of Images -->
        <div class="card-body p-0">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @forelse($data as $banar)
                    <div class="col">
                        <div class="card shadow-sm border-0">
                            <a href="{{ route('banares.edit', $banar->id) }}" class="text-decoration-none">
                                <img src="{{ asset('uploads/' . $banar->path) }}" class="card-img-top" alt="Banar Image"
                                    style="height: 250px; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('banares.show', $banar->id) }}" class="btn btn-outline-primary">
                                        <i class="fas fa-eye"></i> عرض
                                    </a>
                                    <button wire:confirm="سيتم حذف هذا القسم" wire:click="delete({{ $banar->id }})"
                                        class="btn btn btn-outline-danger ">
                                        <i class="fas fa-trash"></i> حذف
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                            <div class="text-danger mb-3">لا يوجد اعلانات مرفوعه حاليا</div>
                            <img width="50" src="{{ asset('admin/photo/seo.png') }}" alt="No Data">
                        </div>
                        <button type="button" class="btn btn-primary">
                            <a class="text-light text-decoration-none" href="{{ route('banares.create') }}">إضافة</a>
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Optional: Add Bootstrap Icons or FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
