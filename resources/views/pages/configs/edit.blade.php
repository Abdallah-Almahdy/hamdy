@extends('admin.app')
@section('content')
   <div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
         <div class="row">
              <div class="col-md-8 offset-md-2">
                <div class="card">
                     <div class="card-header">
                          <h4>تعديل الإعدادات</h4>
                     </div>
                     <div class="card-body">
                          <form action="{{ route('configs.update', $config->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="withQnt">تمكين الكمية</label>
                                <select name="withQnt" id="withQnt" class="form-control">
                                    <option value="yes" {{ $config->withQnt == 'yes' ? 'selected' : '' }}>نعم</option>
                                    <option value="no" {{ $config->withQnt == 'no' ? 'selected' : '' }}>لا</option>
                                </select>
                            </div>
                            <div class="form-group
                                <label for="qntStatus">حالة الكمية</label>
                                <select name="qntStatus" id="qntStatus" class="form-control">
                                    <option value="unavailable" {{ $config->qntStatus == 'unavailable' ? 'selected' : '' }}>غير متوفر</option>
                                    <option value="inactive" {{ $config->qntStatus == 'inactive' ? 'selected' : '' }}>غير نشط</option>
                                    <option value="both" {{ $config->qntStatus == 'both' ? 'selected' : '' }}>كلاهما</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">تحديث الإعدادات</button>
                            </form>
                        </div>
                </div>
                </div>
            </div>
    </div>

@endsection
