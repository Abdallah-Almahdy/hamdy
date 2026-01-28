<div>
    <div class="card card-primary">
        <div class="card-header">
            <h5 class=" text-center">إضافة إعلان جديد </h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit="create" enctype="multipart/form-data" role="form">
            <div class="card-body">

                <div class="col-sm-6 flex-row">
                    <div class="mb-3">
                        <label for="photo" class="form-label">الصوره</label>
                        <input wire:model="photo" class="form-control" type="file" id="photo">
                    </div>


                    @if ($photo ?? 0)
                        <img class="border  w-25" src="{{ $photo->temporaryUrl() }}">
                    @endif

                </div>
                @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror



                @if (session('done'))
                    <div class="callout bg-success flex-row align-items-center callout-success">
                        <h5><i class="fa text-xl pl-1 fa-check-circle" aria-hidden="true"></i>تم اضافة إعلان جديد
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
