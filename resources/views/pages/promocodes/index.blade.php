@extends('admin.app')


@section('content')
    <div class="card">
        <a href="{{ route('promocodes.create') }}" class="btn btn-primary float-left">إضافة كود جديد</a>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>


                        <th>الكود</th>
                        <th> نوع الكود</th>
                        <th> اسم المستخدم</th>
                        <th> عدد أكواد الخصم </th>
                        <th> العدد المتبقي</th>
                        <th> الحد الأدني للطلب</th>
                        <th> نوع الخصم </th>
                        <th> قيمه الخصم </th>
                        <th>تاريخ اللإنتهاء</th>
                        <th> حالة التفعيل </th>
                        <th> حالة التفعيل مع العروض </th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $product)
                        <tr class="borderd table-bordered">






                            <td>{{ $product->code }}</td>
                            <td>
                                @if ($product->promo_cat == 'user')
                                    مستخدم واحد
                                @endif
                                @if ($product->promo_cat == 'all')
                                    مستخدمين متعددين
                                @endif

                                (@if ($product->type == 'limited')
                                    محدود
                                @endif
                                @if ($product->type == 'unlimited')
                                    غير محدود
                                @endif)
                            </td>
                            <td>
                                @if ($product->promo_cat == 'all')
                                    -
                                @else
                                    {{ str_replace(',', ' ', $product->user->name) }}
                                @endif
                            </td>

                            <td>
                                @if ($product->promo_cat == 'user')
                                    -
                                @else
                                    {{ $product->users_limit ?? '-' }}
                                @endif
                            </td>
                            <td>
                                @if ($product->promo_cat == 'user')
                                    -
                                @else
                                    {{ $product->available_codes ?? '-' }}
                                @endif
                            </td>
                            <td>{{ $product->min_order_value }} ج</td>
                            <td>
                                @if ($product->discount_type == 'percentage')
                                    نسبة
                                @endif
                                @if ($product->discount_type == 'cash')
                                    نقدي
                                @endif
                            </td>
                            <td>
                                @if ($product->discount_type == 'percentage')
                                    {{ $product->discount_percentage_value }}%
                                @endif
                                @if ($product->discount_type == 'cash')
                                    {{ $product->discount_cash_value }} ج
                                @endif
                            </td>
                            <td>{{ $product->expiry_date->format('d-m-Y') }}</td>



                            <td>
                                <div class="d-flex justify-content-center mt-1 align-items-center">

                                    <div style="width: 20px; height: 20px;"
                                        class="
                                    @if ($product->active) bg-success @endif
                                    @if (!$product->active) bg-danger @endif
                                    align-self-center rounded-circle ">
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="d-flex justify-content-center mt-1 align-items-center">

                                    <div style="width: 20px; height: 20px;"
                                        class="
                                    @if ($product->check_offer_rate) bg-success @endif
                                    @if (!$product->check_offer_rate) bg-danger @endif
                                    align-self-center rounded-circle ">
                                    </div>
                                </div>

                            </td>

                            <td>
                                @can('product.edit')
                                    <a href="{{ route('promocodes.edit', $product->id) }}">
                                        <span class="text-black p-1 rounded-circle">
                                            <i class="right fas text-lg fa-pen"></i>
                                        </span>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
