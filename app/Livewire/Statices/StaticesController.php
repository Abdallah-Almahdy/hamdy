<?php

namespace App\Livewire\Statices;

use Carbon\Carbon;
use App\Models\User;
use App\Models\order;
use App\Models\product;
use App\Models\ratings;
use App\Models\section;
use App\Models\subSection;
use Livewire\Component;
use Livewire\Attributes\Layout;

class StaticesController extends Component
{
    public $orders;
    public $users;
    public $successOrders;
    public $successOrdersTotal = 0;
    public $faildOrders;
    public $productsCount;
    public $sectionsCount;
    public $subSections;
    public $subSectionsCount;
    public $ratingsCount;
    public $filter = 'all'; // Default filter type
    public $filteredSubSections = [];
    public $startDate;
    public $endDate;
    public $loading = false;
    #[Layout('admin.livewireLayout')]
    public function mount()
    {
        // Set default date range to the last 30 days
        $this->startDate = Carbon::now()->subYears(5)->format('Y-m-d');
        $this->endDate = Carbon::now()->format('Y-m-d');
        $this->startDate = Carbon::now()->subDays(30)->format('Y-m-d');
        $this->endDate = Carbon::now()->format('Y-m-d');

        // الحساب الأولي للقيم بدون أي فلتر
        $this->orders = order::count();
        $this->users = User::count();

        $orders = order::where('status', 1)->get();
        $this->successOrders = $orders->count();
        $this->successOrdersTotal = $orders->sum('totalPrice');

        $this->faildOrders = order::where('status', 2)->count();
        $this->productsCount = product::count();
        $this->sectionsCount = section::count();
        $this->subSectionsCount = subSection::count();
        $this->ratingsCount = ratings::count();

        // الأقسام الفرعية
        $this->subSections = subSection::all()->map(function ($sub) {
            $sub->productsCount = product::where('section_id', $sub->id)->count();
            $sub->orderCount = 0; // ممكن تحسب لاحقًا
            $sub->orderTotal = 0; // ممكن تحسب لاحقًا
            return $sub;
        });

        $this->filteredSubSections = $this->subSections;
    }

    public function applyFilter($value)
    {
        if ($value === 'most') {
            $this->filter = 'most'; // Highest total
        } elseif ($value === 'least') {
            $this->filter = 'least'; // Lowest total
        } else {
            $this->filter = 'all'; // No sorting
        }
    }

    public function updateMetricsByDate()
    {
        $this->loading = true;

        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        $this->orders = order::whereBetween('created_at', [$start, $end])->count();
        $this->users = User::whereBetween('created_at', [$start, $end])->count();

        $orders = order::where('status', 1)
            ->whereBetween('created_at', [$start, $end])
            ->get();

        $this->successOrders = $orders->count();
        $this->successOrdersTotal = $orders->sum('totalPrice');

        $this->faildOrders = order::where('status', 2)
            ->whereBetween('created_at', [$start, $end])
            ->count();

        $this->productsCount = product::whereBetween('created_at', [$start, $end])->count();
        $this->sectionsCount = section::whereBetween('created_at', [$start, $end])->count();
        $this->subSectionsCount = subSection::whereBetween('created_at', [$start, $end])->count();
        $this->ratingsCount = ratings::whereBetween('created_at', [$start, $end])->count();

        $this->subSections = subSection::all()->map(function ($subSection) use ($start, $end) {
            $products = product::where('section_id', $subSection->id)
                ->whereBetween('created_at', [$start, $end])
                ->get();

            $subSection->productsCount = $products->count();

            if ($products->isNotEmpty()) {
                $orders = order::whereHas('orderProducts', function ($query) use ($products) {
                    $query->whereIn('product_id', $products->pluck('id'));
                })->whereBetween('created_at', [$start, $end])->get();

                $subSection->orderCount = $orders->count();
                $subSection->orderTotal = $orders->sum('totalPrice');
            } else {
                $subSection->orderCount = 0;
                $subSection->orderTotal = 0;
            }

            return $subSection;
        });

        // تطبيق الفلتر بعد الحساب
        if ($this->filter === 'most') {
            $this->filteredSubSections = $this->subSections->sortByDesc('orderTotal')->values();
        } elseif ($this->filter === 'least') {
            $this->filteredSubSections = $this->subSections->sortBy('orderTotal')->values();
        } else {
            $this->filteredSubSections = $this->subSections;
        }

        $this->loading = false;

        // dispatch browser event لإرسال البيانات للـ JS
        $this->dispatch('metrics-updated', [
            'orders' => $this->orders,
            'users' => $this->users,
            'successOrders' => $this->successOrders,
            'successOrdersTotal' => $this->successOrdersTotal,
            'faildOrders' => $this->faildOrders,
            'productsCount' => $this->productsCount,
            'sectionsCount' => $this->sectionsCount,
            'subSectionsCount' => $this->subSectionsCount,
            'ratingsCount' => $this->ratingsCount,
        ]);
    }

    public function render()
    {
        return view('livewire.statices.statices-controller');
    }
}

// namespace App\Livewire\Statices;

// use Carbon\Carbon;
// use App\Models\User;
// use App\Models\order;
// use App\Models\product;
// use Livewire\Component;
// use App\Models\subSection;
// use Livewire\Attributes\Layout;

// class StaticesController extends Component
// {
//     public $orders;
//     public $users;
//     public $successOrders;
//     public $successOrdersTotal = 0;
//     public $faildOrders;
//     public $productsCount;
//     public $sectionsCount;
//     public $subSections;
//     public $subSectionsCount;
//     public $filter = 'all'; // Default filter type
//     public $filteredSubSections = [];
//     public $startDate;
//     public $endDate;
//     #[Layout('admin.livewireLayout')]
//     public function mount()
//     {
//         // Set default date range to the last 30 days
//         $this->startDate = Carbon::now()->subDays(30)->format('Y-m-d');
//         $this->endDate = Carbon::now()->format('Y-m-d');
//     }


//     public function applyFilter($value)
//     {
//         if ($value === 'most') {
//             $this->filter = 'most'; // اعلي
//         } elseif ($value === 'least') {
//             $this->filter = 'least'; // اعلي
//         } else {
//             // No sorting, show all
//             $this->filter = 'all'; // اعلي
//         }
//     }


//     public function render()
//     {
//         // dd($this->startDate);
//         $start = Carbon::parse($this->startDate)->startOfDay();
//         $end = Carbon::parse($this->endDate)->endOfDay();
//         $this->successOrdersTotal = 0;
//         // Count total orders and users
//         // $this->orders = Order::count();
//         // if ($this->startDate & $this->endDate) {
//         $this->orders = Order::whereBetween('created_at', [$start, $end])->count();
//         // }
//         $this->users = User::count() - 70;

//         // Get successful orders and calculate total
//         $orders = Order::where('status', 1)->get();
//         if ($this->startDate & $this->endDate) {
//             $orders = Order::where('status', 1)
//                 ->whereBetween('created_at', [$start, $end])
//                 ->get();
//         }

//         $this->successOrders = $orders->count();
//         foreach ($orders as $order) {
//             $this->successOrdersTotal += $order->totalPrice;
//         }

//         // Count failed orders
//         $this->faildOrders = Order::where('status', 2)->count();

//         // Count products and sections
//         $this->productsCount = Product::count();
//         $this->sectionsCount = Section::count();
//         $this->$this->subSectionsCount = $this->subSections->count(); = SubSection::all();
//         $this->subSectionsCount = $this->subSections->count();

//         // Update subsection product and order counts
//         foreach ($this->subSections as $subSection) {
//             // Get products related to the subsection
//             $products = Product::where('section_id', $subSection->id)->get();
//             $productsCount = $products->count();

//             // Initialize order count and total order value
//             $orderCount = 0;
//             $orderTotal = 0;

//             if ($products->isNotEmpty()) {
//                 // Count the number of orders that contain these products
//                 $orders = Order::whereHas('orderProducts', function ($query) use ($products) {
//                     $query->whereIn('product_id', $products->pluck('id'));
//                 })->get();
//                 if ($this->startDate & $this->endDate) {
//                     $orders = Order::whereHas('orderProducts', function ($query) use ($products) {
//                         $query->whereIn('product_id', $products->pluck('id'));
//                     })->whereBetween('created_at', [$start, $end])->get();
//                 }


//                 // Calculate the total value of the orders
//                 $orderCount = $orders->count();

//                 foreach ($orders as $order) {
//                     $orderTotal += $order->totalPrice; // Assuming `totalPrice` is the total amount for each order
//                 }
//             }

//             // Assign the counts and total order value to the subsection
//             $subSection->productsCount = $productsCount;
//             $subSection->orderCount = $orderCount;
//             $subSection->orderTotal = $orderTotal; // Add the total price of orders to the subsection
//         }


//         if ($this->filter === 'most') {
//             $this->subSections = $this->subSections->sortByDesc('orderTotal'); // اقل
//         } elseif ($this->filter === 'least') {
//             $this->subSections = $this->subSections->sortBy('orderTotal'); // اعلي
//         } else {
//             // No sorting, show all
//             $this->filteredSubSections = $this->subSections;
//         }

//         return view('livewire.statices.statices-controller');
//     }
// }
