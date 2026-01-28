   <div>
       <!-- /.card طلبيات لم تفتح -->
       <div class="card card-info">
           <div class="card-header">
               <h3 class="card-title">طلبات جديده</h3>

               <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                       title="Collapse">
                       <i class="fas fa-minus"></i></button>
               </div>
           </div>
           <div class="card-body p-0">
               <table class="table">
                   <thead>
                       <tr>
                           <th> رقم الاوردر</th>
                           <th>اسم العميل</th>
                           <th>المبلغ الكلي</th>
                           <th>حالة</th>
                           <th>الرقم</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($orders as $order)
                           <tr>
                               <td>{{ $order->id }} </td>
                               <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                               <td>{{ $order->totalPrice }} </td>
                               <td> طلب جديد </td>
                               <td>{{ $order->phoneNumber }} </td>
                               <td class="text-right py-0 align-middle">

                                   <a href="{{ route('orders.details', $order->id) }}">
                                       <button class="btn btn-info  rounded">

                                           <i class="fa fa-eye" aria-hidden="true"></i>

                                       </button>
                                   </a>

                                   <div class="btn-group btn-group-sm">


                                       <button wire:click="prep({{ $order->id }})"
                                           class="btn btn-outline-info mr-1 rounded">بدأ التحضير</button>

                                       <button wire:click="cancel({{ $order->id }})"
                                           class="btn btn-danger rounded mr-1">X</button>
                                   </div>
                               </td>
                           </tr>
                       @endforeach






                   </tbody>
               </table>
           </div>
           {{--                                                                   --}}
           <!-- /.card-body -->
       </div>
       <!-- /.card -->

       {{--                                                       علميات   يتم تحضيرها                  --}}

       <div class="card card-info">
           <div class="card-header">
               <h3 class="card-title">طلبات يتم تحضيرها</h3>

               <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                       title="Collapse">
                       <i class="fas fa-minus"></i></button>
               </div>
           </div>
           <div class="card-body p-0">
               <table class="table">
                   <thead>
                       <tr>
                           <th> رقم الاوردر</th>
                           <th>اسم العميل</th>
                           <th>المبلغ الكلي</th>
                           <th>حالة</th>
                           <th>الرقم</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($inPreperOrders as $order)
                           <tr>
                               <td>{{ $order->id }} </td>
                               <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                               <td>{{ $order->totalPrice }} </td>
                               <td>يتم التحضير </td>
                               <td>{{ $order->phoneNumber }} </td>
                               <td class="text-right py-0 align-middle">

                                   <a href="{{ route('orders.details', $order->id) }}">
                                       <button class="btn btn-info  rounded">

                                           <i class="fa fa-eye" aria-hidden="true"></i>

                                       </button>
                                   </a>

                                   <div class="btn-group btn-group-sm">

                                       <button wire:click="delivery({{ $order->id }})"
                                           class="btn btn-outline-info mr-1 rounded">شحن</button>

                                       <button wire:click="cancel({{ $order->id }})"
                                           class="btn btn-danger rounded mr-1">X</button>
                                   </div>
                               </td>
                           </tr>
                       @endforeach






                   </tbody>
               </table>
           </div>
           {{--                                                                   --}}
           <!-- /.card-body -->
       </div>









       {{--                                                       علميات  في الشحن                  --}}

       <div class="card card-info">
           <div class="card-header">
               <h3 class="card-title">طلبات يتم شحنها</h3>

               <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                       title="Collapse">
                       <i class="fas fa-minus"></i></button>
               </div>
           </div>
           <div class="card-body p-0">
               <table class="table">
                   <thead>
                       <tr>
                           <th> رقم الاوردر</th>
                           <th>اسم العميل</th>
                           <th>المبلغ الكلي</th>
                           <th>حالة</th>
                           <th>الرقم</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($inDeliveryOrders as $order)
                           <tr>
                               <td>{{ $order->id }} </td>
                               <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                               <td>{{ $order->totalPrice }} </td>
                               <td>يتم التوصيل </td>
                               <td>{{ $order->phoneNumber }} </td>
                               <td class="text-right py-0 align-middle">

                                   <a href="{{ route('orders.details', $order->id) }}">
                                       <button class="btn btn-info  rounded">

                                           <i class="fa fa-eye" aria-hidden="true"></i>

                                       </button>
                                   </a>

                                   <div class="btn-group btn-group-sm">


                                       <button wire:click="done({{ $order->id }})"
                                           class="btn btn-success rounded mr-1">✔</button>
                                       <button wire:click="cancel({{ $order->id }})"
                                           class="btn btn-danger rounded mr-1">X</button>
                                   </div>
                               </td>
                               </td>
                           </tr>
                       @endforeach






                   </tbody>
               </table>
           </div>
           {{--                                                                   --}}
           <!-- /.card-body -->
       </div>







       {{--                                                       علميات ناجه منتهية                  --}}

       <div class="card card-info">
           <div class="card-header">
               <h3 class="card-title">طلبات ناجحة</h3>

               <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                       title="Collapse">
                       <i class="fas fa-minus"></i></button>
               </div>
           </div>
           <div class="card-body p-0">
               <table class="table">
                   <thead>
                       <tr>
                           <th> رقم الاوردر</th>
                           <th>اسم العميل</th>
                           <th>المبلغ الكلي</th>
                           <th>حالة</th>
                           <th>الرقم</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($successedOrders as $order)
                           <tr>
                               <td>{{ $order->id }} </td>
                               <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                               <td>{{ $order->totalPrice }} </td>
                               <td>عملية منتهية ناجحة</td>
                               <td>{{ $order->phoneNumber }} </td>
                               <td class="text-right py-0 align-middle">

                                   <a href="{{ route('orders.details', $order->id) }}">
                                       <button class="btn btn-info  rounded">

                                           <i class="fa fa-eye" aria-hidden="true"></i>

                                       </button>
                                   </a>

                                   <div class="btn-group btn-group-sm">


                                   </div>
                               </td>
                           </tr>
                       @endforeach






                   </tbody>
               </table>
           </div>
           {{--                                                                   --}}
           <!-- /.card-body -->
       </div>






       {{--                                                       علميات فاشلة                  --}}
       <div class="card card-info">
           <div class="card-header">
               <h3 class="card-title">طلبات فاشلة</h3>

               <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                       title="Collapse">
                       <i class="fas fa-minus"></i></button>
               </div>
           </div>
           <div class="card-body p-0">
               <table class="table">
                   <thead>
                       <tr>
                           <th> رقم الاوردر</th>
                           <th>اسم العميل</th>
                           <th>المبلغ الكلي</th>
                           <th>حالة</th>
                           <th>الرقم</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($faildOrders as $order)
                           <tr>
                               <td>{{ $order->id }} </td>
                               <td>{{ $order->user_info->firstName . ' ' . $order->user_info->lastName }} </td>
                               <td>{{ $order->totalPrice }} </td>
                               <td>{{ $order->status == 2 ? 'عمليه فاشلة' : '' }} </td>
                               <td>{{ $order->phoneNumber }} </td>
                               <td class="text-right py-0 align-middle">

                                   <a href="{{ route('orders.details', $order->id) }}">
                                       <button class="btn btn-info  rounded">

                                           <i class="fa fa-eye" aria-hidden="true"></i>

                                       </button>
                                   </a>

                                   <div class="btn-group btn-group-sm">


                                       <button wire:click="done({{ $order->id }})"
                                           class="btn btn-success rounded mr-1">✔</button>

                                   </div>
                               </td>
                           </tr>
                       @endforeach






                   </tbody>
               </table>
           </div>
           {{--                                                                   --}}
           <!-- /.card-body -->
       </div>

   </div>
