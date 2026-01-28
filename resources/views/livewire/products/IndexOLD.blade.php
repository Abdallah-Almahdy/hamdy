<div>

    <!-- Flash Messages -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif



    <div class="container">
        <div class="mt-4 mb-4">

            <!--   search -->

            <!-- Search Bar -->
            <form wire:submit.prevent="searchProduct">
                <div class="form-group">
                    <label for="search">ابحث عن المنتج:</label>
                    <input type="text" class="form-control" id="search" wire:model.defer="search"
                        placeholder="ابحث عن منتج...">
                </div>

                <button type="button" class="btn btn-primary mb-2" wire:click="searchProduct">
                    بحث
                </button>
                <!-- Reset Search Button -->
                <button type="button" class="btn btn-secondary mb-2" wire:click="resetViewLinks">
                    مسح البحث
                </button>

            </form>


            <!-- Show Zero Stock Products Button -->
            <button type="button" class="btn btn-warning" wire:click="filterZeroStock">
                @if ($showZeroStock)
                    عرض جميع المنتجات
                @else
                    عرض المنتجات التي نفذت
                @endif
            </button>


            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif






            <!-- New Section Selection -->
            <div class="form-group">
                <label for="newSectionId">اختر القسم الجديد:</label>
                <select wire:model="newSectionId" class="form-control" id="newSectionId">
                    <option value="">اختر قسم</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Bulk Actions -->
            <button type="button" class="btn btn-warning" wire:click="updateSection">
                تحديث الأقسام المحددة
            </button>
            <button type="button" class="btn btn-danger" wire:click="deleteSelected">
                حذف المنتجات المحددة
            </button>
        </div>




        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            {{-- <th>
                                <input type="checkbox" wire:model="selectAll" wire:click="toggleSelectAll"
                                    @if (count($selectedProducts) === count($products)) checked @endif>
                            </th> --}}
                            <th width="10px">

                            </th>
                            <th width="10px">صورة</th>
                            <th>الأسم</th>
                            <th>القسم</th>
                            <th>خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class=" @if ($product->qnt == 0) bg-warning @endif">
                                <td>
                                    <input width="200px" type="checkbox" wire:model="selectedProducts"
                                        value="{{ $product->id }}">
                                </td>





                                <td>
                                    <div class="product-image-container" style="position: relative;">
                                        <img class="rounded-circle" width="50" height="50"
                                            src="{{ asset('uploads/' . $product->photo) ?? asset('path/to/default-image.jpg') }}"
                                            alt="Product image" style="cursor: pointer;">

                                        <!-- Hoverable text to trigger photo upload -->
                                        @if (empty($product->photo))
                                            <div class="upload-text" data-product-id="{{ $product->id }}"
                                                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;
                                                        color: white; text-align: center;
                                                        display: flex; justify-content: center; align-items: center; cursor: pointer;">
                                                <span></span>
                                            </div>

                                            <!-- Hidden file input -->
                                            <input type="file" wire:model="photo"
                                                wire:change="uploadPhoto({{ $product->id }})" style="display: none;"
                                                id="file-input-{{ $product->id }}" />
                                        @endif
                                    </div>
                                </td>




                                <td>{{ $product->name }}</td>
                                <td>{{ optional($product->section)->name ?? 'غير متاح' }}</td>
                                <td>
                                    @can('product.edit')
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            <span class="text-black p-1 rounded-circle">
                                                <i class="right fas text-lg fa-pen"></i>
                                            </span>
                                        </a>
                                    @endcan
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <span class="text-info p-1 rounded-circle">
                                            <i class="right fas bg-transparent text-lg fa-eye"></i>
                                        </span>
                                    </a>
                                    @if ($product->qnt > 0)
                                        <!-- Show 'غير متوفر' button if qnt > 0 -->
                                        <button class="btn btn-danger"
                                            wire:click="changeAvailability({{ $product->id }}, 0)">
                                            غير متوفر
                                        </button>
                                    @else
                                        <!-- Show 'متوفر' button if qnt == 0 -->
                                        <button class="btn btn-success"
                                            wire:click="changeAvailability({{ $product->id }}, 1000)">
                                            متوفر
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($viewLinks)
            <div class="mt-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>

    <script>
        console.log('hi');

        document.addEventListener('livewire:load', function() {
            // When the hover text is clicked, trigger the corresponding file input click
            document.querySelectorAll('.upload-text').forEach(function(element) {
                element.addEventListener('click', function() {
                    var productId = element.getAttribute('data-product-id'); // Get the product ID
                    var fileInput = document.getElementById('file-input-' +
                        productId); // Find the associated file input
                    if (fileInput) {
                        fileInput.click(); // Trigger the file input click
                    }
                });
            });
        });
    </script>
</div>
