@extends('admin.errorPage')

@section('content')

<div style=" position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);" class="text-center d-flex justify-content-center align-items-center flex-column">

        <p>هذه الصفحة خارج إطار صلاحيات المستخدم</p>
        <a href="{{ route('dashboard')}}" class="btn btn-outline-info">{{ __('lan.back_to_home_page') }} </a>
</div>

@endsection
