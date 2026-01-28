@extends('admin.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="text-center">إضافة كود جديد</h5>
        </div>
        <form method="POST" action="{{ route('promocodes.update', $id) }}" role="form">
            @csrf
            @method('PUT') <!-- Simulate PUT method -->
            <div class="card-body">
                @if (session('success'))
                    <div class="callout callout-success">
                        <h5><i class="icon fa fa-check"></i> {{ session('success') }}</h5>
                    </div>
                @endif



                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="active"> حالة الكود</label>
                            <select class="form-control" id="active" name="active" required>
                                <option value="7">أختر</option>
                                <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>مفعل</option>
                                <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>معطل</option>
                            </select>
                            @error('active')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="expiry_date">تاريخ الانتهاء</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                value="{{ old('expiry_date') }}">
                            @error('expiry_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>



                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">تحديث</button>
                </div>
        </form>
    </div>
@endsection
