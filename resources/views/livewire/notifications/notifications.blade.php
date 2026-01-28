<div class="card card-primary">
    <div class="card-header">
        <h5 class=" text-center">إضافة صنف جديد</h5>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form">
        <div class="card-body">

            <div class="flex-row">

                <div class="col-sm-6 ">

                    <div class="form-group">
                        <label for="message">الرسالة</label>
                        <input wire:model="message" type="text" class="form-control" id="message"
                            placeholder="ادخل محتوي الرسالة">
                    </div>
                </div>
                @error('message')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror

                <div class="col-sm-6 ">

                    <div class="form-group">
                        <label for="message">اللينك</label>
                        <input wire:model="message" type="text" class="form-control" id="message"
                            placeholder="ادخل محتوي الرسالة">
                    </div>
                </div>
                @error('message')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror


                <div class="col-sm-6 flex-row">
                    <div class="mb-3">
                        <label for="photo" class="form-label">الصوره</label>
                        <input wire:model="photo" class="form-control" type="file" id="photo">
                    </div>

                    {{-- @if ($photo)
                        <img class="border w-25" src="{{ $photo->temporaryUrl() }}">
                    @endif --}}
                </div>
                @error('photo')
                    <div class="text-danger"> error</div>
                @enderror




                <h4>اعدادات مخصصه</h4>
                <h6 class="text-gray text-opacity-25">تخصيصات الأستهداف </h4>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="section">النوع</label>
                            <select wire:model="section" id="section" class="form-control  " style="width: 100%;">

                                <option class="text-gray">اختر النوع...</option>
                                <option value="">ذكر</option>
                                <option value=""> أنثي</option>

                            </select>
                        </div>
                    </div>
                    @error('section_id')
                        <div class="text-danger"> الرجاء اختيار القسم</div>
                    @enderror



                    <div class="col-12 col-sm-6" data-select2-id="58">
                        <div class="form-group" data-select2-id="57">
                            <label>المنطقه </label>
                            <div class="select2-purple" data-select2-id="56">
                                <select class="select2 select2-hidden-accessible" multiple=""
                                    data-placeholder="اختر المنطقه" data-dropdown-css-class="select2-purple"
                                    style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="47">الصباح</option>
                                    <option data-select2-id="48">الغريب</option>
                                    <option data-select2-id="49">الموشي</option>
                                    <option data-select2-id="50">السلام</option>
                                    <option data-select2-id="51">الملاحة</option>
                                    <option data-select2-id="52">ابراج السحاب</option>
                                    <option data-select2-id="53">بورتوفيق</option>
                                </select>
                            </div>
                        </div>

                    </div>



                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="section">العمر</label>
                            <select wire:model="section" id="section" class="form-control  " style="width: 100%;">

                                <option class="text-gray"> اختر الفئة العمرية...</option>
                                <option value="">18-25</option>
                                <option value=""> 25-30</option>
                                <option value=""> 30-40</option>
                                <option value=""> 40-55</option>
                                <option value=""> 55+</option>

                            </select>
                        </div>
                    </div>
                    @error('section_id')
                        <div class="text-danger"> الرجاء اختيار القسم</div>
                    @enderror

            </div>

            @if (session('done'))
                <div class="callout bg-success flex-row align-items-center callout-success">
                    <h5><i class="fa text-xl pl-1 fa-check-circle" aria-hidden="true"></i>

                        {{ session('done') }}
                    </h5>
                </div>
            @endif
            <!-- /.card-body -->

            <div class="card-footer">
                <button wire:click.prevent="send" id="done" class="btn btn-primary">اضافة</button>
            </div>
    </form>
</div>
