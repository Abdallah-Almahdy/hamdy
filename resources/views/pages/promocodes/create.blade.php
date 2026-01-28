@extends('admin.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="text-center">إضافة كود جديد</h5>
        </div>
        <form method="POST" action="{{ route('promocodes.store') }}" role="form">
            @csrf
            <div class="card-body">
                @if (session('success'))
                    <div class="callout callout-success">
                        <h5><i class="icon fa fa-check"></i> {{ session('success') }}</h5>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="code">الكود</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ old('code') }}" required>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="promo_cat">فئة الترويج</label>
                            <select class="form-control" id="promo_cat" name="promo_cat" required>
                                <option value="0">اختر</option>
                                <option value="user" {{ old('promo_cat') == 'user' ? 'selected' : '' }}>مستخدم</option>
                                <option value="all" {{ old('promo_cat') == 'all' ? 'selected' : '' }}>الكل</option>
                            </select>
                            @error('promo_cat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="type">النوع</label>
                            <select class="form-control" id="type" name="type">
                                <option value="">اختر النوع...</option>
                                <option value="limited" {{ old('type') == 'limited' ? 'selected' : '' }}>محدود</option>
                                <option value="unlimited" {{ old('type') == 'unlimited' ? 'selected' : '' }}>غير محدود
                                </option>
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="check_offer_rate">حالة الكود مع العروض</label>
                            <select class="form-control" id="check_offer_rate" name="check_offer_rate">
                                <option value="9">اختر النوع...</option>
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل
                                </option>
                            </select>
                            @error('check_offer_rate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row" id="users_limit_group" d>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="users_limit">حد المستخدمين</label>
                            <input type="number" class="form-control" id="users_limit" name="users_limit"
                                value="{{ old('users_limit') }}">
                            @error('users_limit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="user_id">العميل</label>
                        <select name="user_id" id="user_id" class="form-control  " style="width: 100%;">

                            <option value=" " class="text-gray">اختر العميل...</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"> {{ $user->conc_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                @error('user_id')
                    <div class="text-danger"> الرجاء اختيار المستخدم</div>
                @enderror

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="min_order_value">الحد الأدنى للطلب</label>
                            <input type="number" class="form-control" id="min_order_value" name="min_order_value"
                                value="{{ old('min_order_value') }}">
                            @error('min_order_value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="discount_type">نوع الخصم</label>
                            <select class="form-control" id="discount_type" name="discount_type" required>
                                <option value="0"> اختر </option>
                                <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>
                                    نسبة مئوية</option>
                                <option value="cash" {{ old('discount_type') == 'cash' ? 'selected' : '' }}>نقدي</option>
                            </select>
                            @error('discount_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="expiry_date">تاريخ الانتهاء</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                value="{{ old('expiry_date') }}">
                            @error('expiry_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>



                <div class="row" id="discount_cash_value_group" d>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="discount_cash_value">قيمة الخصم النقدي</label>
                            <input type="number" step="0.01" class="form-control" id="discount_cash_value"
                                name="discount_cash_value" value="{{ old('discount_cash_value') }}">
                            @error('discount_cash_value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row" id="discount_percentage_value_group" d>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="discount_percentage_value">نسبة الخصم (%)</label>
                            <input type="number" class="form-control" id="discount_percentage_value"
                                name="discount_percentage_value" value="{{ old('discount_percentage_value') }}"
                                min="1" max="100">
                            @error('discount_percentage_value')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">إضافة</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Hide by default:
            // Hide the "النوع" select (its form-group container)
            $("#type").closest('.form-group').hide();
            // Hide the "حد المستخدمين" row (already has an id)
            $("#users_limit_group").hide();
            // Hide the "العميل" select (its form-group container)
            $("#user_id").closest('.form-group').hide();
            // Hide both discount value groups
            $("#discount_cash_value_group").hide();
            $("#discount_percentage_value_group").hide();

            // When the فئة الترويج (#promo_cat) changes:
            $("#promo_cat").on('change', function() {
                var promoVal = $(this).val();
                // If the user chose "مستخدم", show the client input and hide the "النوع" field.
                if (promoVal === "user") {
                    $("#user_id").closest('.form-group').show();
                    $("#type").closest('.form-group').hide();
                    // Also hide the users limit since "النوع" remains hidden.
                    $("#users_limit_group").hide();
                }
                // If the user chose "الكل" then show the "النوع" select and hide the client input.
                else if (promoVal === "all") {
                    $("#user_id").closest('.form-group').hide();
                    $("#type").closest('.form-group').show();
                    // Trigger a change to update the users limit display if needed.
                    $("#type").trigger('change');
                }
                // For any other (if applicable) ensure both remain hidden.
                else {
                    $("#user_id").closest('.form-group').hide();
                    $("#type").closest('.form-group').hide();
                    $("#users_limit_group").hide();
                }
            });

            // When the "النوع" (#type) changes:
            $("#type").on('change', function() {
                var typeVal = $(this).val();
                // According to your instructions, if the user selects "غير محدود" (i.e. value "unlimited")
                // then show the "حد المستخدمين" input.
                if (typeVal === "limited") {
                    $("#users_limit_group").show();
                } else {
                    $("#users_limit_group").hide();
                }
            });

            // When the "نوع الخصم" (#discount_type) changes:
            $("#discount_type").on('change', function() {
                var discType = $(this).val();
                // If the discount type is "percentage" (نسبة مئوية) show the percentage group
                if (discType === "percentage") {
                    $("#discount_percentage_value_group").show();
                    $("#discount_cash_value_group").hide();
                }
                // If the discount type is "cash" (نقدي) show the cash group
                else if (discType === "cash") {
                    $("#discount_cash_value_group").show();
                    $("#discount_percentage_value_group").hide();
                }
                // Otherwise, hide both.
                else {
                    $("#discount_cash_value_group").hide();
                    $("#discount_percentage_value_group").hide();
                }
            });

            // On page load trigger changes to set the correct state in case of any preselected values.
            $("#promo_cat").trigger('change');
            $("#discount_type").trigger('change');
        });
    </script>
@endsection
