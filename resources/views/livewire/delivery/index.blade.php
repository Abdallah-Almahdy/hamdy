    <div class="p-4">
        <h2 class="text-xl font-bold mb-4">إضافة/تعديل منطقة</h2>

        @if (session()->has('message'))
            <div class="bg-success text-white p-2 mb-4">
                {{ session('message') }}
            </div>
        @endif
      
 <div class="delivery-section" data-section="all" >
            <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center w-100">
                <div class="form-group w-100">
                    <label for="is_free">دليفري مجاني </label>
                    <select wire:model="is_free" class="form-control click" id="is_free" name="is_free" required>
                        <option value=""> اختر</option>
                        <option value="1"> تفعيل</option>
                        <option value="2">تعطيل </option>
                    </select>
                    @error('is_free')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-100 d-flex justify-content-start m-2 mt-4">
                    <button wire:click="handleFree" class="btn btn-success text-white px-4 py-2 rounded">
                        تطبيق
                    </button>
                </div>
            </div>
        </div>
      

        <form wire:submit.prevent="{{ $edit_id ? 'updateDelivery' : 'addDelivery' }}" class="mb-4">
            <div class="mb-2">
                <label for="name" class="block text-sm font-medium">المنطقة</label>
                <input type="text" id="name" wire:model="name" class="w-full p-2 border rounded form-control">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="delivery_price" class="block text-sm font-medium">السعر</label>
                <input type="text" id="delivery_price" wire:model="delivery_price"
                    class="w-full p-2 form-control border rounded">
                @error('delivery_price')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center gap-2">

                <button type="submit" class="bg-blue-500 btn-success text-white px-4 py-2 rounded">
                    {{ $edit_id ? 'تحديث' : 'إضافة' }}
                </button>
                @if ($edit_id)
                    <button type="button" wire:click="cancelEdit"
                        class="bg-gray-500 btn-danger text-white px-4 py-2 rounded">
                        إلغاء
                    </button>
                @endif
            </div>
        </form>

        <h3 class="text-lg font-bold mb-2">قائمة المناطق</h3>
        {{-- search --}}
        <div class="mb-4">
            <input type="text" wire:model="search" wire:keyup="makeSearch" placeholder="بحث عن منطقة"
                class=" p-2 border rounded form-control">
        </div>



        <table class="w-full table border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th width="10%" class="border border-gray-300 p-2">مسلسل</th>
                    <th class="border border-gray-300 p-2">المنطقة</th>
                    <th class="border border-gray-300 p-2">السعر</th>
                    <th class="border border-gray-300 p-2">إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveries as $delivery)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $delivery->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $delivery->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $delivery->delivery_price }}</td>
                        <td class="border border-gray-300 p-2">
                            <button wire:click="editDelivery({{ $delivery->id }})"
                                class=" btn-warning  text-white px-2 py-1 rounded">
                                تعديل
                            </button>
                            <button wire:click="deleteDelivery({{ $delivery->id }})"
                                class="bg-red-500 btn-danger text-white px-2 py-1 rounded"
                                onclick="return confirm('هل أنت متأكد من أنك تريد حذف هذه المنطقة؟')">
                                حذف
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
