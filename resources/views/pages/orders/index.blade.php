@extends('admin.app')

@section('content')
    <!-- /.card طلبيات لم تفتح -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">{{ __('lan.price') }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>اسم العميل</th>
                        <th>العنوان</th>
                        <th>الفاتوره</th>
                        <th>الرقم</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>علي احمد</td>
                        <td>باراديس</td>
                        <td>38 ج</td>
                        <td>0102-056-4328</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>
                            </div>
                        </td>
                    <tr>
                        <td>اروي</td>
                        <td>السلام</td>
                        <td>38 ج</td>
                        <td>0102-056-4328</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>
                            </div>
                        </td>
                    <tr>
                        <td>مي مني</td>
                        <td>عدلي منصور</td>
                        <td>38 ج</td>
                        <td>0102-056-4328</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>
                            </div>
                        </td>
                    <tr>
                        <td>احمد هاني</td>
                        <td>الترعة</td>
                        <td>38 ج</td>
                        <td>0102-056-4328</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>
                            </div>
                        </td>
                    <tr>
                        <td>محمد عادل</td>
                        <td>باراديس</td>
                        <td>38 ج</td>
                        <td>0102-056-4328</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.card طلبيات جاري اعدادها  -->
    <div class="card card-cyan">
        <div class="card-header">
            <h3 class="card-title">طلبيات جاري اعدادها </h3>

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
                        <th>File Name</th>
                        <th>File Size</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Functional-requirements.docx</td>
                        <td>49.8005 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>
                            </div>
                        </td>
                    <tr>
                        <td>UAT.pdf</td>
                        <td>28.4883 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Email-from-flatbal.mln</td>
                        <td>57.9003 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Logo.png</td>
                        <td>50.5190 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Contract-10_12_2014.docx</td>
                        <td>44.9715 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.card طلبيات في التوصيل -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">طلبيات في التوصيل </h3>

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
                        <th>File Name</th>
                        <th>File Size</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Functional-requirements.docx</td>
                        <td>49.8005 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>UAT.pdf</td>
                        <td>28.4883 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Email-from-flatbal.mln</td>
                        <td>57.9003 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Logo.png</td>
                        <td>50.5190 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Contract-10_12_2014.docx</td>
                        <td>44.9715 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="#" class="btn btn-success"><i class="fa fa-check-square"
                                        aria-hidden="true"></i></a>

                            </div>
                        </td>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.card طلبيات منتهيه -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">طلبيات منتهيه </h3>

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
                        <th>File Name</th>
                        <th>File Size</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Functional-requirements.docx</td>
                        <td>49.8005 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>UAT.pdf</td>
                        <td>28.4883 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Email-from-flatbal.mln</td>
                        <td>57.9003 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Logo.png</td>
                        <td>50.5190 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                            </div>
                        </td>
                    <tr>
                        <td>Contract-10_12_2014.docx</td>
                        <td>44.9715 kb</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>

                            </div>
                        </td>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
