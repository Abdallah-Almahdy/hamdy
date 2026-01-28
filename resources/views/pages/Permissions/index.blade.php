@extends('admin.app')
@section('links')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href=" {{ asset('AdminLTE-3-RTL/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')
    {{-- <livewire:sections.section-index/> --}}
    <livewire:Permissions.Index />
@endsection
