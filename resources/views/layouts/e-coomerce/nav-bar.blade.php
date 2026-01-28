<div style="color: rgb(14, 90, 167); background-color: white; z-index: 999999;"
    class="z-10 z-50 shadow-sm main-navbar   justify-content-center
                                                            sticky-top align-items-sm-center flex-column ">
    <div class="bg-white ">


        <div class="container-fluid d-flex justify-content-center">
            <div class="row">

                <div class="my-auto d-sm-flex d-flex justify-content-between  align-items-center  col-md-5">

                    <a style="color: rgb(14, 90, 167)" class="d-lg-none pr-4" href={{ route('home') }}>
                        <i class="fa fa-home"></i>

                    </a>
                    {{-- search --}}

                    <livewire:search.search />
                    {{-- end search --}}



                    <a style="color: rgb(14, 90, 167)" class="d-lg-none" href={{ route('cart') }}>

                        <i class="fa fa-shopping-cart">

                        </i> السلة

                    </a>



                </div>


                <div class="my-auto d-none d-lg-flex col-md-5">
                    <ul class="nav justify-content-center">

                        <li class="nav-item d-sm-block">
                            <a style="color: rgb(14, 90, 167)" class="nav-link" href={{ route('cart', 23) }}>
                                @session('cart')
                                    <p style="width:20px;height:20px;position :absolute;left:0;top:0;"
                                        class="bg-danger text-center rounded-circle ">
                                        {{ count(session('cart')) }}
                                    </p>
                                @endsession
                                <i class="fa fa-shopping-cart">
                                </i> السلة


                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a style="color: rgb(14, 90, 167)" class="nav-link dropdown-toggle" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>{{ Auth::user()->name ?? 'مستخدم' }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
                                        Cart</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="flex-row my-auto justify-content-center d-none d-lg-flex col-md-2 ">
                    <a href="{{ route('home') }}">
                        <div class="flex-row d-flex justify-content-center align-items-center">

                            <img width="150" class="img-fluid"
                                src="{{ asset('admin/photo/supermarket-shop-logo-vector.png') }}">
                            <h5 style="color: rgb(14, 90, 167)" class="text-center brand-name"> كل يوم </h5>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    {{-- bottom navbar --}}

    <ul style="background-color: white" class="bg-white nav d-none d-lg-flex justify-content-center">
        <li class="nav-item ">
            {{-- <a class="nav-link active" href="#">جميع المنتجات</a> --}}
        </li>
        <li class="nav-item">
            {{-- <a class="nav-link" href="">جميع الأقسام</a> --}}
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"> </a>
        </li>
    </ul>





</div>
