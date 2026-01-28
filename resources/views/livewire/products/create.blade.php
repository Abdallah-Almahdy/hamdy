<div class="max-w-10xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <!-- رأس البطاقة -->
    <div class="bg-blue-600 px-6 py-4">
        <h3 class="text-xl font-semibold text-white text-center">إضافة صنف جديد</h3>
    </div>

    <!-- محتوى النموذج -->
    <form wire:submit="create" class="p-6 space-y-6">
        <!-- الصف الأول: الاسم والسعر -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- حقل الاسم -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم</label>
                <input wire:model="name" type="text" id="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="أدخل اسم الصنف">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- حقل السعر -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">السعر</label>
                <input wire:model="price" type="text" id="price"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="0.00">
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- الصف الثاني: الباركود والوصف -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- حقل الباركود -->
            <div>
                <label for="bar_code" class="block text-sm font-medium text-gray-700 mb-2">الباركود</label>
                <input wire:model="bar_code" type="text" id="bar_code"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="أدخل الباركود">
            </div>

            <!-- حقل الوصف -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                <input wire:model="description" type="text" id="description"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="أدخل وصف الصنف">
            </div>
        </div>

        <!-- الصف الثالث: القسم والمخزون -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- حقل القسم -->
            <div>
                <label for="section" class="block text-sm font-medium text-gray-700 mb-2">القسم</label>
                <select wire:model="section" id="section"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <option value="" class="text-gray-500">اختر القسم...</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
                @error('section_id')
                    <p class="mt-1 text-sm text-red-600">الرجاء اختيار القسم</p>
                @enderror
            </div>

            <!-- خيارات المخزون -->
            @can('showQntOption')
                <div class="space-y-2">
                    <!-- زر المخزون والكمية في نفس الصف -->
                    <div class="flex items-center justify-between">
                        <!-- زر المخزون -->
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="stock" class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[90px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">المخزون</span>
                            </label>
                        </div>

                        <!-- حقل الكمية - مساحة محجوزة دائماً -->
                        <div class="w-1/2">
                            <div id="stockQntDiv"
                                class="opacity-0 pointer-events-none transition-all duration-300 ease-in-out">
                                <label for="stockQnt" class="block text-sm font-medium text-gray-700 mb-1">الكمية</label>
                                <input wire:model="stockQnt" name="stockQnt" type="number"
                                    class="w-full px-3 py-1.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    id="stockQnt" placeholder="الكمية بالمخزن">
                            </div>
                        </div>
                    </div>


                </div>
            @endcan
        </div>

        <!-- باقي الكود يبقى كما هو -->
        <!-- خيارات إضافية -->
        <div class="bg-gray-50 p-4 rounded-lg space-y-4">
            <h4 class="font-medium text-gray-700">خيارات إضافية</h4>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- الأكثر مبيعاً -->
                <label class="flex items-center space-x-2 space-x-reverse cursor-pointer">
                    <input wire:model="bestSaller" type="checkbox" value="1"
                        class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                    <span class="text-sm text-gray-700">الأكثر مبيعاً</span>
                </label>

                <!-- يظهر في الأول -->
                <label class="flex items-center space-x-2 space-x-reverse cursor-pointer">
                    <input wire:model="comeFirst" type="checkbox" value="1"
                        class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                    <span class="text-sm text-gray-700">يظهر في الأول</span>
                </label>

                <!-- نشط -->
                <label class="flex items-center space-x-2 space-x-reverse cursor-pointer">
                    <input wire:model="active" type="checkbox" value="1"
                        class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                    <span class="text-sm text-gray-700">نشط</span>
                </label>
                <label class="flex items-center space-x-2 space-x-reverse cursor-pointer">
                    <input wire:model="is_avaliable" type="checkbox" value="1"
                        class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                    <span class="text-sm text-gray-700">متاح</span>
                </label>
            </div>
        </div>

        <!-- رفع الصورة -->
        <div class="col-sm-6 flex-row">
            <div class="mb-3">
                <label for="photo" class="form-label">الصوره</label>
                <input wire:model.lazy ="photo" class="form-control" type="file" id="photo">
            </div>

            @if ($photo)
                <img class="border w-25" src="{{ $photo->temporaryUrl() }}">
            @endif
        </div>
        @error('photo')
            <div class="text-danger"> error</div>
        @enderror


<!-- رسالة النجاح -->
@if (session('done'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center">
        <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
        </svg>
        <span>تم إضافة منتج جديد بنجاح</span>
    </div>
@endif

<!-- زر الإضافة -->
<div class="pt-6 border-t border-gray-200">
    <button type="submit"
        class="w-full md:w-auto px-8 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
        إضافة الصنف
    </button>
</div>
</form>
</div>

<!-- JavaScript لإدارة ظهور/اختفاء حقل الكمية -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stockToggle = document.getElementById('stock');
        const stockQntDiv = document.getElementById('stockQntDiv');

        if (stockToggle && stockQntDiv) {
            stockToggle.addEventListener('change', function() {
                if (this.checked) {
                    // إظهار الحقل
                    stockQntDiv.classList.remove('opacity-0', 'pointer-events-none');
                    stockQntDiv.classList.add('opacity-100', 'pointer-events-auto');
                } else {
                    // إخفاء الحقل
                    stockQntDiv.classList.remove('opacity-100', 'pointer-events-auto');
                    stockQntDiv.classList.add('opacity-0', 'pointer-events-none');
                }
            });

            // تهيئة الحالة الأولية
            if (stockToggle.checked) {
                stockQntDiv.classList.remove('opacity-0', 'pointer-events-none');
                stockQntDiv.classList.add('opacity-100', 'pointer-events-auto');
            }
        }
    });
</script>
