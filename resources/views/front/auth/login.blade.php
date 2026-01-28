@extends('layouts.e-coomerce.authhome')

@section('content')
    <form method="POST" action="{{ route('customerLogin') }}">
        @csrf
        <div class="register-box">

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg"> تسجيل الدخول بحساب حالي </p>

                    <form action="../../index.html" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="الأيميل">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="كلمة المرور">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>


                    </form>



                </div>

            </div>
        </div>
    </form>
@endsection
