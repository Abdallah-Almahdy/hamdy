@extends('admin.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h5 class=" text-center">إضافة صنف جديد</h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">الاسم</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ادخل الاسم">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">الوصف</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ادخل الوصف">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">القسم</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ادخل الوصف">
                </div>

                <textarea class="form-group" id="w3review" name="w3review" rows="7" cols="100"></textarea>

                <div class="form-group">
                    <label for="exampleInputFile">الصوره</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" placeholder="اختر ملف" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">اختر</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">انقر</span>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">اضافة</button>
            </div>
        </form>
    </div>
@endsection
