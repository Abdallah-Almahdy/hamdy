@extends('admin.app')

@section('content')
    <livewire:Notifications.notifications :token="$token" />
@endsection
