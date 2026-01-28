@extends('admin.app')



@section('content')
    @if(  count($data) > 0 )
        <h4 class="pb-2">جميع المنتجات بقسم ال{{ $section }}</h4>
    @endif


    <livewire:sections.show :data="$data"/>
@endsection
