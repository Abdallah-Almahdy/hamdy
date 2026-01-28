<style>
    * {
       font-size: 15px;
        /* Reduce font size for thermal printing */
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    table {
        border-collapse: collapse;
        margin: 0;
                text-align: end;

        width: 100%;
        max-width: 6.5cm;
        /* Set max width to match thermal printer paper size */
        word-wrap: break-word;
        /* Allow text wrapping */
        overflow: hidden;
    }

    td,
    th {
        border: 1px solid black;
        padding: 3px 5px;
        /* Reduce padding to fit the content */
        outline: none;
        word-wrap: break-word;
        /* Allow text to wrap within cells */
        max-width: 6cm;
        /* Prevent content from exceeding the printer's width */
        text-overflow: ellipsis;
        /* Add ellipsis for overflowed text */
        white-space: normal;
        /* Prevent long words from breaking the layout */
    }

    .flex {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .con {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .print-btn {
        margin: 10px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        font-size: 14px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    .print-btn:hover {
        background-color: #45a049;
    }

   
    @media print {

        /* Hide page numbers and URL */
        body {
            visibility: hidden;
        }

        .print,
        .print * {
            visibility: visible;
        }

        /* Remove default margins */
        @page {
            margin: 0;
        }

        /* Hide the footer and the URL text */
        .print footer,
        .print footer * {
            display: none;
        }

        /* Remove the print header and footer from the browser */
        .no-print {
            display: none;
        }
    }

    .btns {
        display: flex;
        justify-content: center;
    }

    .name {
        width: 100%;
        text-align: end;
    }

    .long {
        width: 100%;
    }

    .products {
        font-size: 16px;

    }
</style>

<div class="con">
    <!-- Print Button -->
    <div class="btns">
        <button class="print-btn" onclick="window.print()">طباعة مرةأخرى</button>
        <a class="print-btn" href="{{ route('orders.details', $data['orderData']->id) }}">العودة</a>
    </div>

    <div class="print">
        <!-- Receipt Title -->
        <table>
            <tr>
                <th colspan="2">إيصال تحضير</th>
            </tr>
        </table>

        <!-- Order Information -->
        <table>
            <tr>
                <td class="long">{{ $data['orderData']['id'] }} </td>
                <th>مسلسل</th>
            </tr>
            <tr>
                <td class="long">{{ \Carbon\Carbon::parse($data['orderData']->created_at)->format('Y-m-d H:i') }}</td>
                <td>التاريخ</td>
            </tr>
        </table>

        <!-- Customer Information -->
        <table>
            <tr>
                <td class="long">{{ $data['userInfo']->firstName . ' ' . $data['userInfo']->lastName }}</td>
                <td>اسم العميل</td>
            </tr>
            <tr>
                <td class="long">
                    @if ($data['orderData']->address == 1)
                        {{ $data['userInfo']->addressCountry . ', ' . $data['userInfo']->addresscity }}
                        @if ($data['userInfo']->addressstreet)
                            , {{ $data['userInfo']->addressstreet }}
                        @endif
                        {{ ' ' . $data['userInfo']->addressbuildingNumber }}
                        @if ($data['userInfo']->addressfloorNumber)
                            , الدور: {{ $data['userInfo']->addressfloorNumber }}
                        @endif
                        , رقم الشقة: {{ $data['userInfo']->addressApartmentNumber }}
                        @if ($data['userInfo']->disSign)
                            , علامة مميزة: {{ $data['userInfo']->disSign }}
                        @endif
                    @elseif ($data['orderData']->address == 2)
                        {{ $data['userInfo']->addressCountry2 . ', ' . $data['userInfo']->addresscity2 }}
                        @if ($data['userInfo']->addressstreet2)
                            , {{ $data['userInfo']->addressstreet2 }}
                        @endif
                        {{ ' ' . $data['userInfo']->addressbuildingNumber2 }}
                        @if ($data['userInfo']->addressfloorNumber2)
                            , الدور: {{ $data['userInfo']->addressfloorNumber2 }}
                        @endif
                        , رقم الشقة: {{ $data['userInfo']->addressApartmentNumber2 }}
                        @if ($data['userInfo']->disSign2)
                            , علامة مميزة: {{ $data['userInfo']->disSign2 }}
                        @endif
                    @endif
                </td>
                <td>العنوان</td>
            </tr>
            <tr>
                <td class="long">
                    {{ preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $data['userInfo']->phonenum) }}</td>
                <td>رقم الهاتف</td>
            </tr>
        </table>

        <!-- Ordered Products -->
        <table class="products" style="font-size: 16px">
            <tr>
                <th>الكمية</th>
                <th class="name">اسم الصنف</th>
                <th>م</th>
            </tr>
            @foreach ($data['orderProdutcs'] as $product)
                <tr>
                    <td>{{ $product['porductCount'] }}</td>
                    <td>{{ $product['porductData']->name }}</td>
                    <td>{{ $loop->iteration }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
    // Function to trigger print of the content inside the .print div
    function printDiv() {
        var printContents = document.getElementsByClassName('print')[0].innerHTML;
        var originalContents = document.body.innerHTML;

        // Replace the entire body with the content of the .print div
        document.body.innerHTML = printContents;

        // Trigger the print dialog
        window.print();

        // Restore the original content after printing
        document.body.innerHTML = originalContents;
    }

    // Trigger print on page reload
    window.onload = function() {
        window.print();
        printDiv(); // Automatically trigger print when the page loads or reloads
    };
</script>
