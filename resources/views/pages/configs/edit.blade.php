@extends('admin.app')
@section('content')
    <div class="container">
        @if (session('success'))
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
                                <label for="qntStatus">حالة
                                الكمية</label>
                                <select name="qntStatus" id="qntStatus" class="form-control">
                                    <option value="unavailable" {{ $config->qntStatus == 'unavailable' ? 'selected' : '' }}>
                                        غير متوفر</option>
                                    <option value="inactive" {{ $config->qntStatus == 'inactive' ? 'selected' : '' }}>غير
                                        نشط</option>
                                    <option value="both" {{ $config->qntStatus == 'both' ? 'selected' : '' }}>كلاهما
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Minimum Supported Version</label>
                                <input type="text" name="min_supported_version"
                                    value="{{ old('min_supported_version', $config->min_supported_version) }}"
                                    class="form-control @error('min_supported_version') is-invalid @enderror">
                                @error('min_supported_version')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Exact Blocked Version</label>
                                <input type="text" name="exact_blocked_version"
                                    value="{{ old('exact_blocked_version', $config->exact_blocked_version) }}"
                                    class="form-control @error('exact_blocked_version') is-invalid @enderror">
                                @error('exact_blocked_version')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="maintenance_mode" value="1" class="form-check-input"
                                    id="maintenance_mode"
                                    {{ old('maintenance_mode', $config->maintenance_mode) ? 'checked' : '' }}>
                                <label for="maintenance_mode" class="form-check-label">Enable Maintenance Mode</label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Maintenance Message</label>
                                <textarea name="maintenance_message" rows="3"
                                    class="form-control @error('maintenance_message') is-invalid @enderror">{{ old('maintenance_message', $config->maintenance_message) }}</textarea>
                                @error('maintenance_message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Theme Color</label>
                                <input style="width: 60px" type="color" name="color"
                                    value="{{ old('color', $config->color ?? '#ffffff') }}"
                                    class="form-control form-control-color @error('color') is-invalid @enderror">
                                @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">تحديث الإعدادات</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
