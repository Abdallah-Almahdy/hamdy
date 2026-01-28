@extends('admin.app')
@section('links')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href=" {{ asset('AdminLTE-3-RTL/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">

      
        @can('section.create')
            <th>
                <a href="{{ route('sections.create') }}" class="btn btn-outline-success btn-sm"> إضافة جديد
                    +</a>
            </th>
        @endcan
    </div>
    <livewire:sections.index />
@endsection
