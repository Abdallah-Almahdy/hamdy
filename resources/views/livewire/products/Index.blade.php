    <div>
        <div class="container">
            <div class="mt-4 mb-4">

                <!--   search -->

                <!-- Search Bar -->


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
                <div class="space-y-4">

                    <!-- Toggle Button -->


                    <!-- Conditional Section -->
                    @if ($showBulkActions)
                        <div class="space-y-4">

                            <!-- Section Select -->
                            <div class="relative">
                                <label for="newSectionId" class="block text-sm font-medium text-gray-700 mb-1">
                                    اختر القسم الجديد:
                                </label>
                                <div class="relative">
                                    <select wire:model="newSectionId" id="newSectionId"
                                        class="appearance-none w-full rounded-full border border-gray-300 bg-white py-2.5 pl-4 pr-10 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                                        <option value="">اختر قسم</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Chevron Icon -->
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-400">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Bulk Action Buttons -->
                            <div class="flex gap-3">
                                <button type="button" wire:click="updateSection"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium transition">
                                    <i class="fas fa-sync-alt mr-2"></i> تحديث الأقسام
                                </button>

                                <button type="button" wire:click="deleteSelected"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-red-500 hover:bg-red-600 text-white text-sm font-medium transition">
                                    <i class="fas fa-trash-alt mr-2"></i> حذف المحدد
                                </button>
                            </div>
                        </div>
                    @endif

                </div>


            </div>



            <div class="card">
                <div class="overflow-x-auto rounded-md shadow-sm border border-gray-200">
                    <table
                        class="min-w-full divide-y text-center divide-gray-200 text-sm text-right text-gray-700 bg-white">
                        <thead class="bg-blue-200 text-gray-700  text-xs font-semibold uppercase">
                            <tr>
                                <th colspan="5" class="px-3 py-3 bg-blue-50 border-b border-gray-200">

                                    <div class="flex justify-between items-center gap-2">
                                        <div class="flex justify-between items-center gap-2">

                                            @can('product.create')
                                                <a href="{{ route('products.create') }}"
                                                    class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-600 hover:bg-green-700 text-white shadow-md transition">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        stroke-width="2" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 4v16m8-8H4">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @endcan
                                            <button type="button" wire:click="toggleBulkActions"
                                                class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-600 hover:bg-blue-700 text-white leading-none transition">
                                                <i class="fas fa-pen fa-lg"></i>


                                            </button>



                                            <button type="button" wire:click="filterZeroStock"
                                                class="w-12 h-12 rounded-full bg-yellow-500 hover:bg-yellow-400 text-white flex items-center justify-center transition duration-200"
                                                title="{{ $showZeroStock ? 'عرض جميع المنتجات' : 'عرض المنتجات التي نفذت' }}">
                                                @if ($showZeroStock)
                                                    <i class="fas fa-boxes fa-lg"></i>
                                                @else
                                                    <i class="fas fa-box-open fa-lg"></i>
                                                @endif
                                            </button>

                                            <button type="button" wire:click="filterInactiveStock"
                                                class="w-12 h-12 rounded-full bg-yellow-500 hover:bg-yellow-400 text-white flex items-center justify-center transition duration-200"
                                                title="{{ $showInactiveStock ? 'عرض جميع المنتجات' : 'عرض المنتجات  الغير متاحه' }}">
                                                @if ($showInactiveStock)
                                                    <i class="fas fa-toggle-on fa-lg"></i>
                                                @else
                                                    <i class="fas fa-toggle-off fa-lg"></i>
                                                @endif
                                            </button>



                                        </div>

                                        <div class="flex justify-between items-center gap-2">
                                            {{-- search text box --}}
                                            <input wire:model.defer="search" id="search"
                                                placeholder="ابحث عن منتج..."
                                                class="w-56 sm:w-72 rounded-full border border-gray-300 bg-white px-4 py-2 text-sm
                                        focus:border-blue-500 focus:ring-blue-500 outline-none">

                                            {{-- search (magnifier) button --}}
                                            <button type="button" wire:click="searchProduct"
                                                class="w-9 h-9 flex items-center justify-center rounded-full
                                        bg-blue-500 hover:bg-blue-600 text-white transition">
                                                <i class="fas fa-search text-xs"></i>
                                            </button>

                                            {{-- clear (×) button --}}
                                            <button type="button" wire:click="resetViewLinks"
                                                class="w-9 h-9 flex items-center justify-center rounded-full
            bg-gray-400 hover:bg-gray-500 text-white transition duration-150">
                                                <i class="fas fa-times text-xs"></i>
                                            </button>
                                        </div>


                                    </div>
                                </th>

                            </tr>
                            <tr>
                                <th class="px-3 py-2 border border-gray-200 w-[10px]"></th>
                                <th class="px-3 py-2 border border-gray-200 w-[10px]">صورة</th>
                                <th class="px-3 py-2 border border-gray-200">الأسم</th>
                                <th class="px-3 py-2 border border-gray-200">القسم</th>
                                <th class="px-3 py-2 border border-gray-200">خيارات</th>
                            </tr>

                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($products as $product)
                                <tr
                                    class="@if ($product->qnt == 0) bg-yellow-100 @else hover:bg-gray-50 @endif">
                                    <td class="px-3 py-2 border border-gray-200">
                                        <input type="checkbox" wire:model="selectedProducts" value="{{ $product->id }}"
                                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    </td>

                                    <td class="px-3 py-2 border border-gray-200">
                                        <div class="relative w-12 h-12">
                                            <img class="w-12 h-12 rounded-full object-cover border border-gray-300"
                                                src="{{ asset('uploads/' . $product->photo) ?? asset('path/to/default-image.jpg') }}"
                                                alt="img">

                                            @if (empty($product->photo))
                                                <div class="absolute inset-0 flex items-center justify-center text-white bg-black bg-opacity-40 cursor-pointer"
                                                    data-product-id="{{ $product->id }}">
                                                    <span>رفع صورة</span>
                                                </div>
                                                <input type="file" wire:model="photo"
                                                    wire:change="uploadPhoto({{ $product->id }})" class="hidden"
                                                    id="file-input-{{ $product->id }}" />
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-3 py-2 border border-gray-200">
                                        {{ $product->name }}
                                    </td>

                                    <td class="px-3 py-2 border border-gray-200">
                                        {{ optional($product->section)->name ?? 'غير متاح' }}
                                    </td>

                                    <td class="px-3 py-2 border border-gray-200 text-center">
                                        <div class="inline-flex items-center justify-center gap-1">

                                            @can('product.edit')
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-500 hover:bg-blue-600 text-white hover:no-underline transition-shadow shadow-sm">
                                                    <i class="fas fa-pen text-xs"></i>
                                                </a>
                                            @endcan

                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-500 hover:bg-gray-600 text-white hover:no-underline transition-shadow shadow-sm">
                                                <i class="fas fa-eye text-xs"></i>
                                            </a>

                                            @if ($product->active == 1 && $product->qnt > 0)
                                                <button wire:click="changeAvailability({{ $product->id }})"
                                                    class="w-8 h-8 flex items-center justify-center rounded-full bg-red-500 hover:bg-red-600 text-white transition-shadow shadow-sm">
                                                    <i class="fas fa-times text-xs"></i>
                                                </button>
                                            @else
                                                <button wire:click="changeAvailability({{ $product->id }})"
                                                    class="w-8 h-8 flex items-center justify-center rounded-full bg-green-500 hover:bg-green-600 text-white transition-shadow shadow-sm">
                                                    <i class="fas fa-check text-xs"></i>
                                                </button>
                                            @endif

                                        </div>
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
