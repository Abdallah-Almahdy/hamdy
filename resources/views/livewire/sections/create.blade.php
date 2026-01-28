<div>
    <div class="card card-primary">
        <div class="card-header">
            <h5 class=" text-center">إضافة قسم جديد</h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit="create" enctype="multipart/form-data" role="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">الاسم</label>
                    <input wire:model="name" type="text" class="form-control" id="name" placeholder="ادخل الاسم">
                </div>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


                <div class="col-sm-6 ">

                    <div class="form-group">
                        <label for="description"> الوصف</label>
                        <input wire:model="description" type="text" class="form-control" id="description"
                            placeholder="ادخل  الوصف">
                    </div>
                </div>
                {{--                --}}
                {{--                --}}
                {{--                <div class="col-sm-6"> --}}
                {{--                    <!-- textarea --> --}}
                {{--                    <div class="form-group"> --}}
                {{--                        <label for="description">الوصف</label> --}}
                {{--                        <textarea wire:model="description" --}}
                {{--                                  id="description" --}}
                {{--                                  class="form-control" --}}
                {{--                                  rows="5" --}}
                {{--                                  placeholder=" ..."></textarea> --}}
                {{--                    </div> --}}
                {{--                </div> --}}
                {{--                @error('description') --}}
                {{--                <div class="text-danger">{{ $message }}</div> --}}
                {{--                @enderror --}}
                {{--                --}}
                {{--                --}}

                <div class="flex-row row">



                    <div class="col-sm-4">
                        <!-- select -->
                        <div class="form-group">
                            <label>نوع القسم</label>
                            <select wire:model="sectionType" id="sectionType" class="custom-select">
                                <option>إختر النوع</option>
                                <option value="main">رئيسي</option>
                                <option value="sub">فرعي</option>
                            </select>
                        </div>
                    </div>



                    <div class="col-sm-6 invisible" id="sectionDiv">

                        <div class="form-group">
                            <label for="section">القسم الرئيسي </label>
                            <select wire:model="mainSection" id="section" class="form-control  " style="width: 100%;">

                                <option class="text-gray">اختر القسم...</option>

                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}"> {{ $section->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    @error('section_id')
                        <div class="text-danger"> الرجاء اختيار القسم</div>
                    @enderror
                </div>




                <div class="col-sm-6 flex-row">
                    <div class="mb-3">
                        <label for="photo" class="form-label">الصوره</label>
                        <input wire:model="photo" class="form-control" type="file" id="photo">
                    </div>


                    @if ($photo)
                        <img class="border  w-25" src="{{ $photo->temporaryUrl() }}">
                    @endif

                </div>
                @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror



                @if (session('done'))
                    <div class="callout bg-success flex-row align-items-center callout-success">
                        <h5><i class="fa text-xl pl-1 fa-check-circle" aria-hidden="true"></i>تم اضافة قسم جديد
                            بنجاح
                        </h5>
                    </div>
                @endif
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary ">
                        اضافة
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
