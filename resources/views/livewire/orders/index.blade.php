   <div>
       <!-- Order-status chain -->
       <!-- Full-width progress bar with icon steps -->
       <!-- component -->
       <!-- Add Font Awesome for icons -->

       <!-- Add Font Awesome if not already included -->

       <!-- New Orders Icon -->
       <!-- Font Awesome (place this in your <head> if not already included) -->



       {{-- new --}}
       <table class="table table-bordered">
           <thead class=" bg-gradient-light">
               <tr>


                   <th> رقم الاوردر</th>
                   <th>اسم العميل</th>
                   <th>المبلغ الكلي</th>
                   <th>حالة</th>
                   <th>الرقم</th>
                   <th class="text-center">إعدادات</th>
               </tr>
           </thead>
           <tbody>
               @forelse ($orders as $order)
                   <tr>
                       <td>{{ $order->id }} </td>
                       <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                       <td>{{ $order->totalPrice }} </td>
                       <td> طلب جديد </td>
                       <td>{{ $order->phoneNumber }} </td>

                       <td class="text-center py-0 align-middle">

                           <a href="{{ route('orders.details', $order->id) }}">
                               <button class="btn btn-outline-info  rounded">

                                   معاينة
                                   <i class="fa fa-eye" aria-hidden="true"></i>

                               </button>
                           </a>

                           <div class="btn-group ">




                               <button wire:click="prep({{ $order->id }})" class="btn btn-outline-info mr-1 rounded">


                                   بدأ التحضير
                                   <i class="fa fa-truck" aria-hidden="true"></i>

                               </button>

                               <button wire:click="cancel({{ $order->id }})"
                                   class="btn btn-outline-danger rounded mr-1">
                                   إلغاء
                                   {{-- <i class="fa fa-times-circle" aria-hidden="true"></i> --}}
                                   <i class="fa fa-times" aria-hidden="true"></i>

                               </button>
                           </div>
                       </td>
                   </tr>

               @empty
                   <tr>
                       <td colspan="6" class="text-center  text-danger">

                           <i class="fa fa-info-circle" aria-hidden="true"></i>


                           لا يوجد طلبات جديده
                       </td>
                   </tr>
               @endforelse

           </tbody>
       </table>
       {{-- end new --}}

       <!-- /.card طلبيات لم تفتح -->

       <!-- /.card -->

       {{--                                                       علميات   يتم تحضيرها                  --}}
       <table class="table table-bordered">
           <thead class="bg-gradient-light">
               <tr>


                   <th> رقم الاوردر</th>
                   <th>اسم العميل</th>
                   <th>المبلغ الكلي</th>
                   <th>حالة</th>
                   <th>الرقم</th>
                   <th class="text-center">إعدادات</th>
               </tr>
           </thead>
           <tbody>
               @forelse ($inPreperOrders as $order)
                   <tr>
                       <td>{{ $order->id }} </td>
                       <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                       <td>{{ $order->totalPrice }} </td>
                       <td>يتم التحضير </td>
                       <td>{{ $order->phoneNumber }} </td>
                       <td class="text-center py-0 align-middle">

                           <a href="{{ route('orders.details', $order->id) }}">
                               <button class="btn btn-outline-info  rounded">

                                   معاينة
                                   <i class="fa fa-eye" aria-hidden="true"></i>

                               </button>
                           </a>

                           <div class="btn-group ">


                               <button wire:click="delivery({{ $order->id }})"
                                   class="btn btn-outline-info mr-1 rounded">


                                   شحن
                                   <i class="fa fa-truck" aria-hidden="true"></i>

                               </button>

                               <button wire:click="cancel({{ $order->id }})"
                                   class="btn btn-outline-danger rounded mr-1">
                                   إلغاء
                                   {{-- <i class="fa fa-times-circle" aria-hidden="true"></i> --}}
                                   <i class="fa fa-times" aria-hidden="true"></i>

                               </button>
                           </div>
                       </td>
                   </tr>

               @empty
                   <tr>
                       <td colspan="6" class="text-center  text-danger">

                           <i class="fa fa-info-circle" aria-hidden="true"></i>


                           لا يوجد طلبات يتم تحضيرها
                       </td>
                   </tr>
               @endforelse

           </tbody>
       </table>







       <table class="table table-bordered">
           <thead class="bg-gradient-light">
               <tr>


                   <th> رقم الاوردر</th>
                   <th>اسم العميل</th>
                   <th>المبلغ الكلي</th>
                   <th>حالة</th>
                   <th>الرقم</th>
                   <th class="text-center">إعدادات</th>
               </tr>
           </thead>
           <tbody>
               @forelse ($inDeliveryOrders as $order)
                   <tr>
                       <td>{{ $order->id }} </td>
                       <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                       <td>{{ $order->totalPrice }} </td>
                       <td>يتم التوصيل </td>
                       <td>{{ $order->phoneNumber }} </td>
                       {{-- new btns --}}
                       <td class="text-center py-0 align-middle">

                           <a href="{{ route('orders.details', $order->id) }}">
                               <button class="btn btn-outline-info  rounded">

                                   معاينة
                                   <i class="fa fa-eye" aria-hidden="true"></i>

                               </button>
                           </a>

                           <div class="btn-group ">



                               <button wire:click="done({{ $order->id }})"
                                   class="btn btn-outline-success rounded mr-1">

                                   إتمام الطبية
                                   <i class="fa fa-check" aria-hidden="true"></i>

                               </button>


                               <button wire:click="cancel({{ $order->id }})"
                                   class="btn btn-outline-danger rounded mr-1">
                                   إلغاء
                                   {{-- <i class="fa fa-times-circle" aria-hidden="true"></i> --}}
                                   <i class="fa fa-times" aria-hidden="true"></i>

                               </button>
                           </div>
                       </td>
                       {{-- end new btns --}}


                   </tr>

               @empty
                   <tr>
                       <td colspan="6" class="text-center  text-danger">

                           <i class="fa fa-info-circle" aria-hidden="true"></i>


                           لا يوجد طلبات يتم توصيلها
                       </td>
                   </tr>
               @endforelse

           </tbody>
       </table>


       {{--                                                       علميات  في الشحن                  --}}







       <table class="table table-bordered">
           <thead class="bg-success">
               <tr>


                   <th> رقم الاوردر</th>
                   <th>اسم العميل</th>
                   <th>المبلغ الكلي</th>
                   <th>حالة</th>
                   <th>الرقم</th>
                   <th class="text-center">إعدادات</th>
               </tr>
           </thead>
           <tbody>
               @forelse ($successedOrders as $order)
                   <tr>
                       <td>{{ $order->id }} </td>
                       <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                       <td>{{ $order->totalPrice }} </td>
                       <td>طلبية منتهية ناجحة</td>
                       <td>{{ $order->phoneNumber }} </td>
                       {{-- new btns --}}
                       <td class="text-center py-0 align-middle">

                           <a href="{{ route('orders.details', $order->id) }}">
                               <button class="btn btn-outline-info  rounded">

                                   معاينة
                                   <i class="fa fa-eye" aria-hidden="true"></i>

                               </button>
                           </a>


                       </td>
                       {{-- end new btns --}}
                   </tr>

               @empty
                   <tr>
                       <td colspan="6" class="text-center  text-danger">

                           <i class="fa fa-info-circle" aria-hidden="true"></i>


                            لا يوجد طلبات ناجحة اليوم
                       </td>
                   </tr>
               @endforelse

           </tbody>
       </table>

       {{--                                                       علميات ناجه منتهية                  --}}







       {{--                                                       علميات فاشلة                  --}}
       <table class="table table-bordered">
           <thead class="bg-danger">
               <tr>


                   <th> رقم الاوردر</th>
                   <th>اسم العميل</th>
                   <th>المبلغ الكلي</th>
                   <th>حالة</th>
                   <th>الرقم</th>
                   <th class="text-center">إعدادات</th>
               </tr>
           </thead>
           <tbody>
               @forelse ($faildOrders as $order)
                   <tr>
                       <td>{{ $order->id }} </td>
                       <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                       <td>{{ $order->totalPrice }} </td>
                       <td>{{ $order->status == 2 ? 'طلبية فاشلة' : '' }} </td>
                       <td>{{ $order->phoneNumber }} </td>
                       {{-- new btns --}}
                       <td class="text-center py-0 align-middle">

                           <a href="{{ route('orders.details', $order->id) }}">
                               <button class="btn btn-outline-info  rounded">

                                   معاينة
                                   <i class="fa fa-eye" aria-hidden="true"></i>

                               </button>
                           </a>

                           <div class="btn-group ">



                               <button wire:click="done({{ $order->id }})"
                                   class="btn btn-outline-success rounded mr-1">

                                   إتمام الطبية
                                   <i class="fa fa-check" aria-hidden="true"></i>

                               </button>



                           </div>
                       </td>
                       {{-- end new btns --}}
                   </tr>

               @empty
                   <tr>
                       <td colspan="6" class="text-center  text-danger">

                           <i class="fa fa-info-circle" aria-hidden="true"></i>


                           لا يوجد طلبيات فاشلة اليوم
                       </td>
                   </tr>
               @endforelse

           </tbody>
       </table>



   </div>
