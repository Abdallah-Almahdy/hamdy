<div>





    <div class="row texr-sm">
        <div class="col-lg-3 col-6">
            <!-- small box -->

            <div class="small-box bg-info">

                <div class="inner">
                    <h3 id="totalOrders">{{ $orders ?? 0 }}</h3>


                </div>
                <div class="icon">
                   <i class="ion ion-bag"></i>
                <a href="{{route('orders.orderDetails')}}" class="small-box-footer"><p style="color: white">إجمالي الطلبات</p> <i style="color: white" class="fas fa-eye"></i></a>
                </div>




            </div>

        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h5 id="successOrdersTotal">
                        ({{ number_format($successOrdersTotal, 2)?? 0 }} ج.م)
                        <br>
                        <h6 id="successOrders">{{{ $successOrders ?? 0}}}</h6>
                    </h5>

                    <p> إجمالي الطلبات الناجحة</p>

                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 id="totalUsers">{{ $users }}</h3>

                    <p> إجمالي المستخدمين</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 id="faildOrders" >{{ $faildOrders ?? 0}}</h3>

                    <p> إجمال الطلبات الفاشلة</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="sectionsCount">{{ $sectionsCount ?? 0}}</h3>

                    <p>  إجمالي عدد الأقسام الرئيسية</p>
                </div>
                <div class="icon">
                    <i class="fa fa-th-large fa-3x"></i>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 id="subSectionsCount">{{ $subSectionsCount ?? 0}}</h3>

                    <p> إجمالي عدد الأقسام الفرعية </p>
                </div>
                <div class="icon">
                    <i class="fa fa-tasks fa-3x"></i>
                </div>

            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 id="productsCount">{{ $productsCount }}</h3>

                    <p> إجمالي عدد المنتجات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cube fa-3x"></i>
                </div>

            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 id="ratingsCount">{{ $ratingsCount ?? 0 }}</h3>

                    <p> تقييم  </p>
                </div>
                <div class="icon">
                    <i class="fa fa-comments" aria-hidden="true"></i>

                </div>

            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="startDate" class="form-label"> من </label>
            <input type="date" id="startDate" wire:model="startDate" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="endDate" class="form-label">إلي </label>
            <input type="date" id="endDate" wire:model="endDate" class="form-control">
        </div>

    </div>
<div class="text-end mb-4">
    <button wire:click="updateMetricsByDate"
            class="btn btn-primary"
            wire:loading.attr="disabled"
            wire:target="updateMetricsByDate">

        {{-- يظهر عندما لا يوجد تحميل --}}
        <span wire:loading.remove wire:target="updateMetricsByDate" @if($loading) style="display:none" @endif>
            تطبيق
        </span>

        {{-- يظهر أثناء التحميل --}}
        <span wire:loading wire:target="updateMetricsByDate" @if(!$loading) style="display:none" @endif>
            <span class="spinner-border spinner-border-sm" role="status"></span>
            جاري التحميل...
        </span>

    </button>
</div>


    <style>
        .card {
            width: 100%;
            height: 2   00px; /* Set a fixed height for the cards */
            display: flex;
            text-align: center;
            flex-direction: column;
            justify-content: space-between;
        }
        /* .card-body {
            flex-grow: 1;
        } */
        .card-img-top {
            width: 50px;
            height: 50px;
            margin: 0 auto;
            object-fit: cover;
        }
        </style>
        <!-- SubSection with the Most Orders -->

<script>
     $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
</script>

    <div class="container">

        <div class="my-3">
            <div class="btn-group" role="group" aria-label="Order Filters">

                <button wire:click="applyFilter('most')" class="btn btn-success">
                    <i class="fa fa-sort-amount-up"></i> الأعلي
                </button>
                <button wire:click="applyFilter('least')" class="btn btn-warning">
                    <i class="fa fa-sort-amount-down"></i> الأقل
                </button>
                <button wire:click="applyFilter('all')" class="btn btn-primary">
                    <i class="fa fa-list"></i> الكل
                </button>
            </div>
        </div>


        <div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
            <thead>
                <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                    colspan="1" aria-label="بي     engine: activate to sort column descending" aria-sort="ascending">اسم القسم</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                    colspan="1" aria-label="Browser: activate to sort column ascending">عدد المنتجات</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                     colspan="1" aria-label="عدد الطلبات(s): activate to sort column ascending">عدد الطلبات</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                    colspan="1" aria-label="Engine version: activate to sort column ascending"> إجمال الطلباات</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($subSections as $subSection)

            </tr><tr class="even">
              <td class="sorting_1 dtr-control"> {{ $subSection->name }}</td>
              <td class="sorting_1 dtr-control">  {{ $subSection->productsCount }}</td>
              <td class="">   {{ $subSection->orderCount }}</td>
              <td class=""> {{ number_format($subSection->orderTotal, 2) }} ج.م</td>
            </tr>
            @endforeach
        </tbody>
            <tfoot>
            <tr>
                <th rowspan="1" colspan="1"> {{$subSectionsCount}} قسم</th>
                <th rowspan="1" colspan="1">{{$productsCount}} منتج </th>
                <th rowspan="1" col span="1">{{$successOrders}} طلب</th>
                <th rowspan="1" colspan="1">{{ number_format($successOrdersTotal, 2)}}ج.م</th>
            </tr>
            </tfoot>
          </table></div></div>

</div>

@livewireScripts
<script>
document.addEventListener('livewire:load', function () {
    window.addEventListener('metrics-updated', event => {
        const data = event.detail;
        console.log('Received metrics update:', data);
        // تحديث الحقول مباشرة
        document.querySelector('#totalOrders').textContent = data.orders ?? 0;
        document.querySelector('#totalUsers').textContent = data.users ?? 0;
        document.querySelector('#successOrders').textContent = data.successOrders ?? 0;
        document.querySelector('#successOrdersTotal').textContent = data.successOrdersTotal ?? 0;
        document.querySelector('#faildOrders').textContent = data.faildOrders ?? 0;
        document.querySelector('#productsCount').textContent = data.productsCount ?? 0;
        document.querySelector('#sectionsCount').textContent = data.sectionsCount ?? 0;
        document.querySelector('#subSectionsCount').textContent = data.subSectionsCount ?? 0;
        document.querySelector('#ratingsCount').textContent = data.ratingsCount ?? 0;
    });
});
</script>
