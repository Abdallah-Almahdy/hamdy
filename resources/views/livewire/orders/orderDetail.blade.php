<div>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">
                <i class="fa fa-shopping-cart me-2"></i>قائمة الطلبات
            </h3>
        </div>

        <div class="card-body">
            <!-- فلترة الطلبات -->
<div class="bg-white p-4 rounded-lg border mb-4">
    <!-- فلترة الطلبات -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">حالة الطلب</label>
            <select wire:model.live="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <option value="">الكل</option>
                <option value="1">قيد الانتظار</option>
                <option value="2">قيد التجهيز</option>
                <option value="3">قيد التوصيل</option>
                <option value="4">مكتمل</option>
                <option value="5">ملغي</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">من تاريخ</label>
            <input type="date" wire:model.live="startDate" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">إلى تاريخ</label>
            <input type="date" wire:model.live="endDate" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">عدد النتائج</label>
            <select wire:model.live="perPage" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <option value="10">10 نتائج</option>
                <option value="25">25 نتيجة</option>
                <option value="50">50 نتيجة</option>
                <option value="100">100 نتيجة</option>
            </select>
        </div>
    </div>

    <!-- الإحصائيات والأزرار -->
    <div class="flex flex-wrap items-center justify-between gap-4">
        <button wire:click="resetFilters"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-600 bg-gray-50 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
            <i class="fa fa-refresh"></i>
            إعادة تعيين
        </button>

        <div class="flex flex-wrap gap-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600">{{ $totalOrders }}</div>
                <div class="text-sm text-gray-500">عدد الطلبات</div>
            </div>

            <div class="text-center">
                <div class="text-2xl font-bold text-green-600">{{ number_format($totalAmount, 2) }} ج.م</div>
                <div class="text-sm text-gray-500">الإجمالي</div>
            </div>
        </div>
    </div>
</div>

            <!-- جدول الطلبات -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="80">#</th>
                            <th>اسم العميل</th>
                            <th>رقم الهاتف</th>
                            <th>المبلغ الإجمالي</th>
                            <th>حالة الطلب</th>
                            <th>تاريخ الطلب</th>
                            <th width="120">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>
                            <td>
                                @if($order->user_info)
                                    <div class="d-flex align-items-center">

                                          
                                        <div>
                                            <strong>{{ $order->user_info->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $order->user_info->email ?? 'لا يوجد بريد' }}</small>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">عميل غير مسجل</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-phone text-primary me-2"></i>
                                    {{ $order->phone ?? $order->phoneNumber ?? 'غير متوفر' }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success fs-6">
                                    {{ number_format($order->totalPrice, 2) }} ج.م
                                </span>
                            </td>
                            <td>
                                @php
                                    $statusColors = [
                                        1 => 'warning',
                                        2 => 'info',
                                        3 => 'primary',
                                        4 => 'success',
                                        5 => 'danger'
                                    ];
                                    $statusText = [
                                        1 => 'قيد الانتظار',
                                        2 => 'قيد التحضير',
                                        3 => 'قيد التوصيل',
                                        4 => 'مكتمل',
                                        5 => 'ملغي'
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }} p-2">
                                    <i class="fa
                                        @if($order->status == 1) fa-clock
                                        @elseif($order->status == 2) fa-cogs
                                        @elseif($order->status == 3) fa-truck
                                        @elseif($order->status == 4) fa-check-circle
                                        @elseif($order->status == 5) fa-times-circle
                                        @endif me-1">
                                    </i>
                                    {{ $statusText[$order->status] ?? 'غير معروف' }}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <i class="fa fa-calendar text-primary me-1"></i>
                                    {{ $order->created_at->format('Y-m-d') }}
                                </div>
                                <small class="text-muted">
                                    {{ $order->created_at->format('h:i A') }}
                                </small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button wire:click="showOrder({{ $order->id }})"
                                            class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <div class="empty-state">
                                    <i class="fa fa-shopping-cart fa-3x text-muted mb-3"></i>
                                    <h5>لا توجد طلبات</h5>
                                    <p class="text-muted">لم يتم العثور على طلبات تطابق معايير البحث</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- الترقيم -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    عرض {{ $orders->firstItem() }} - {{ $orders->lastItem() }} من {{ $orders->total() }} طلب
                </div>
                <div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- تفاصيل الطلب Modal -->
    <div wire:ignore.self class="modal fade" id="orderDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">تفاصيل الطلب #<span id="orderId"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="orderDetailsContent">
                    <!-- سيتم تحميل التفاصيل هنا عبر AJAX -->
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .avatar-sm {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-title {
        font-weight: bold;
        font-size: 14px;
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
    }

    .table tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .badge {
        font-size: 0.85em;
        font-weight: 600;
    }
</style>
@endpush

@push('scripts')
<script>
    // عرض تفاصيل الطلب
    Livewire.on('showOrderDetails', (data) => {
        document.getElementById('orderId').textContent = data.order.id;
        document.getElementById('orderDetailsContent').innerHTML = data.html;
        const modal = new bootstrap.Modal(document.getElementById('orderDetailsModal'));
        modal.show();
    });

    // تحديث التاريخ الافتراضي في inputs
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        const monthAgo = new Date();
        monthAgo.setDate(monthAgo.getDate() - 30);
        const monthAgoStr = monthAgo.toISOString().split('T')[0];

        // تعيين القيم الافتراضية إذا كانت فارغة
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');

        if (!startDateInput.value) {
            startDateInput.value = monthAgoStr;
        }

        if (!endDateInput.value) {
            endDateInput.value = today;
        }
    });
</script>
@endpush
