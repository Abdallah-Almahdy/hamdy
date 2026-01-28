@extends('admin.app')


@section('content')
    <livewire:products.create />
@endsection

@section('scripts')
    <script>
        let checkBox = document.getElementById("stock")
        let stockQntDiv = document.getElementById("stockQntDiv")
        let done = document.getElementById("done")
        checkBox.addEventListener('change', function() {
            if (this.checked) {
                stockQntDiv.classList.remove("invisible")

            } else {
                stockQntDiv.classList.add("invisible")

            }
        })

        done.addEventListener('click', function() {
            checkBox.checked = false

        })
    </script>
@endsection
