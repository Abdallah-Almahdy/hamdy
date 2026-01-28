@extends('layouts.e-coomerce.home')

@section('content')
    <div>


        hello {{ app('request')->input('search') }}
    </div>
@endsection
