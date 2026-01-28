<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\order;

class orderDetail extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $status = '';
    public $startDate;
    public $endDate;
    public $perPage = 10;

    protected $queryString = [
        'status' => ['except' => ''],
        'startDate' => ['except' => ''],
        'endDate' => ['except' => ''],
    ];

    public function mount()
    {

    }

    public function updating($property)
    {
        if (in_array($property, ['status', 'startDate', 'endDate', 'perPage'])) {
            $this->resetPage();
        }
    }

    public function render()
    {


        $orders = order::with(['user_info', 'orderProducts'])
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->when($this->startDate, function ($query) {
                return $query->whereDate('created_at', '>=', $this->startDate);
            })
            ->when($this->endDate, function ($query) {
                return $query->whereDate('created_at', '<=', $this->endDate);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);



        $totalOrders = $orders->total();
        $totalAmount = Order::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->sum('totalPrice');

        $statuses = [
            1 => 'قيد الانتظار',
            2 => 'قيد التجهيز',
            3 => 'قيد التوصيل',
            4 => 'مكتمل',
            5 => 'ملغي'
        ];

        return view('livewire.orders.orderDetail', [
            'orders' => $orders,
            'totalOrders' => $totalOrders,
            'totalAmount' => $totalAmount,
            'statuses' => $statuses
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['status', 'startDate', 'endDate']);

    }
}
