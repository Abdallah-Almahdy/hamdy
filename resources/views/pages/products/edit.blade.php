@extends('admin.app')



@section('content')
    <livewire:products.edit :data="$data" :sections="$sections"/>
@endsection

