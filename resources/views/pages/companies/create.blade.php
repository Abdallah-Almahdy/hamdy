@extends('admin.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h5 class=" text-center">إضافة قسم جديد</h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">الاسم</label>
                    <input type="text" class="form-control" id="name" placeholder="ادخل الاسم">
                </div>

                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea id="description" class="form-control" rows="5"
                                  placeholder=" ..."></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">الصوره</label>
                    <input class="form-control" type="file" id="photo">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">اضافة</button>
            </div>
        </form>
    </div>
@endsection
