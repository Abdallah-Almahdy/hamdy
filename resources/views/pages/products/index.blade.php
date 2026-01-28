    @extends('admin.app')

    @section('styles')
        <style>
            .product-image-container {
                position: relative;
                display: inline-block;
            }

            .upload-text {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;

                color: white;
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                font-size: 14px;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .product-image-container:hover .upload-text {
                opacity: 1;
            }

            input[type='checkbox'] {

                width: 30px;
                height: 30px;
                background: white;
                border-radius: 5px;
                border: 2px solid #555;
            }
        </style>
    @endsection

    @section('content')
   

        <livewire:Products.Index />
    @endsection
    @section('scripts')
        <script>
            // console.log('hi');

            document.addEventListener('livewire:load', function() {
                // When the hover text is clicked, trigger the corresponding file input click
                document.querySelectorAll('.upload-text').forEach(function(element) {
                    element.addEventListener('click', function() {
                        var productId = element.getAttribute('data-product-id'); // Get the product ID
                        var fileInput = document.getElementById('file-input-' +
                            productId); // Find the associated file input
                        if (fileInput) {
                            fileInput.click(); // Trigger the file input click
                        }
                    });
                });
            });
        </script>
    @endsection
