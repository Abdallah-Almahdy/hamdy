<div>
    <div>
        <div class="card card-primary">
            <div class="card-header">
                <h5 class=" text-center">تعديل القسم -{{ $data->name }}-</h5>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form wire:submit="update" enctype="multipart/form-data" role="form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">ادخل الاسم الجديد</label>
                        <input wire:model="name" type="text" class="form-control" id="name"
                            placeholder="{{ $data->name }}">
                    </div>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror


                    <div class="col-sm-6 flex-row">
                        <div class="mb-3">
                            <label for="photo" class="form-label">اختر الصورة الجديدة</label>
                            <input wire:model="photo" class="form-control" type="file" id="photo">
                        </div>

                        @if ($photo)
                            <img class="border  w-25" src="{{ $photo->temporaryUrl() }}">
                        @else
                            <img class="border  w-25" src="{{ asset('uploads/' . $data->photo) }}">
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
                            تحديث
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
