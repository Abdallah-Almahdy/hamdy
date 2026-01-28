<div>
    <div class="card card-primary">
        <div class="card-header">
            <h5 class=" text-center">إضافة إعلان جديد </h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit="create" enctype="multipart/form-data" role="form">
            <div class="card-body">

                <div class="col-sm-6 flex-row">
                    <div class="mb-3">
                        <label for="photo" class="form-label">الصوره</label>
                        <input wire:model="photo" class="form-control" type="file" id="photo">
                    </div>


                    @if ($photo ?? 0)
                        <img class="border  w-25" src="{{ $photo->temporaryUrl() }}">
                    @endif

                </div>
                @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror


                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="click">نوع الإعلان </label>
                        <select wire:model="click" class="form-control click" id="click" name="click" required>

                            <option value=""> اختر</option>
                            <option value="0"> عادي</option>
                            <option value="1">قابل للضغط </option>
                        </select>
                        @error('click')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="adLink">

                        <div class="form-group">
                            <label for="adLink">مكان الإعلان </label>
                            <select wire:model="adLink" class="form-control " id="adLink" name="adLink" required>
                                <option value="0">
                                    اختر</option>
                                <option value="1">قسم
                                    رئيسي
                                </option>
                                <option value="2">قسم فرعي
                                </option>
                                <option value="3">منتج
                                </option>
                                <option value="4">صفحة العروض
                                </option>
                            </select>
                        </div>
                        @error('adLink')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror


                        <div class="dependent-section" id="main_sec_group">
                            <div class="form-group">
                                <label for="main_sec_id">القسم الرئيسي</label>
                                <select wire:model="main_sec_id" name="main_sec_id" id="main_sec_id"
                                    class="form-control">
                                    <option value="">اختر القسم الرئيسي...</option>
                                    @foreach ($main_secitons as $main_seciton)
                                        <option value="{{ $main_seciton->id }}">{{ $main_seciton->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('main_sec_id')
                                <div class="text-danger"> الرجاء اختيار القسم الرئيسي</div>
                            @enderror
                        </div>

                        <!-- Sub Section -->
                        <div class="dependent-section" id="sub_sec_group">
                            <div class="form-group">
                                <label for="sub_sec_id">القسم الفرعي</label>
                                <select wire:model="sub_sec_id" name="sub_sec_id" id="sub_sec_id" class="form-control">
                                    <option value="">اختر القسم الفرعي...</option>
                                    @foreach ($sub_secitons as $sub_seciton)
                                        <option value="{{ $sub_seciton->id }}">{{ $sub_seciton->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('sub_sec_id')
                                <div class="text-danger"> الرجاء اختيار القسم الفرعي</div>
                            @enderror
                        </div>

                        <!-- Product -->
                        <div class="dependent-section" id="product_id_group">
                            <div class="form-group">
                                <label for="product_id">المنتج</label>
                                <select wire:model="product_id" name="product_id" id="product_id" class="form-control">
                                    <option value="">اختر المنتج...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('product_id')
                                <div class="text-danger"> الرجاء اختيار المنتج</div>
                            @enderror
                        </div>
                    </div>

                </div>
                @if (session('done'))
                    <div class="callout bg-success flex-row align-items-center callout-success">
                        <h5><i class="fa text-xl pl-1 fa-check-circle" aria-hidden="true"></i>تم اضافة إعلان جديد
                            بنجاح
                        </h5>
                    </div>
                @endif
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary ">
                        اضافة
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.prodduct_id').select2();
            $('.js-example-basic-single').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Keyup event to capture input
            $('#producdt_id').on('keyup', function() {
                var searchTerm = $(this).val().toLowerCase();
                var results = [];

                // Iterate through the options and check if they contain the search term
                $('#product_id option').each(function() {
                    var optionText = $(this).text().toLowerCase();
                    if (optionText.indexOf(searchTerm) !== -1) {
                        results.push($(this).text());
                    }
                });

                // Display search results
                if (results.length > 0) {
                    $('#searchResults').html('Results: ' + results.join(', '));
                } else {
                    $('#searchResults').html('No results found.');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function toggleSections() {
                // Hide all first
                $('.dependent-section').hide();
                $('.adLink').hide();

                // Get selected value (case-sensitive exact match)
                const adLinkValue = $('#adLink').val();
                const clickValue = $('#click').val();

                if (clickValue == '1') {
                    $('.adLink').show();
                }


                // Show relevant section based on selection
                if (adLinkValue === '1') {
                    $('#main_sec_group').show();
                } else if (adLinkValue === '2') {
                    $('#sub_sec_group').show();
                } else if (adLinkValue === '3') {
                    $('#product_id_group').show();
                }
                // Value 4 (offers) hides all
            }

            // Initial state
            toggleSections();

            // On change event
            $('#adLink').on('change', toggleSections);
            $('#click').on('change', toggleSections);
        });
    </script>
@endsection
