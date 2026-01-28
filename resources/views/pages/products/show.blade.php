@extends('admin.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center">
            <h5>تفاصيل المنتج - {{ $product->name }} -</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>{{ __('lan.name') }}</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lan.price') }}</td>
                        <td>{{ number_format($product->price, 2) }} ج.م</td>
                    </tr>
                    <tr>
                        <td>{{ __('lan.description') }}</td>
                        <td>{{ $product->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lan.section') }}</td>
                        <td>{{ $product->section->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('lan.qnt') }}</td>
                        <td>
                            @if($product->active)
                                {{ $product->qnt }}
                            @else
                                غير متوفر
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>الأكثر مبيعاً</td>
                        <td>
                            @if($product->best_saller)
                                نعم
                            @else
                                لا
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>يظهر في الاول</td>
                        <td>
                            @if($product->come_first)
                                نعم
                            @else
                                لا
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('lan.photo') }}</td>
                        <td>
                            <img width="200" height="200" class="border" src="{{ asset('uploads/' . $product->photo) }}" alt="{{ $product->name }}">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
