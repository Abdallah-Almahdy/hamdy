@extends('admin.app')

@section('content')
    الشركات

    <div class="container">
        <div class="row">

            <div class="card ">
                <div class="card-header bg-info">
                    <h3 class="card-title">الشركات</h3>

                    <div class="card-tools ">
                        <div class="input-group  input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="بحث">

                            <div class="input-group-append bg-white rounded">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered   table-hover">
                        <thead>
                        <tr>
                            <th>-</th>
                            <th>الاسم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($companies as $company)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $company->name }}</td>
                            </tr>

                        @empty
                            <tr>
                                <td>لا توجد شركات مسجلة</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>

@endsection
