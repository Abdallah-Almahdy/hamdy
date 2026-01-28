@extends('layouts.e-coomerce.home')


@section('content')
    <livewire:cart.index />
@endsection


@section('scripts')
    {{-- <script>
        function total_calculate() {
            var total = 0;
            //loop through subtotal
            $("#total").each(function() {
                //chck if not empty
                total += this.html() * 1; //add that value
            })
            //assign to total span
            $("#totalPrice").text(total.toFixed(2))
        }
        total_calculate()
    </script> --}}
@endsection
