        {{-- <div>
            <div class="container">

                <div class="card">


                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="10px">صورة</th>
                                    <th>الأسم</th>
                                    <th>النوع</th>
                                    <th>خيارات</th>
                                    @can('section.create')
                                        <th>
                                            <a href="{{ route('sections.create') }}" class="btn btn-success btn-sm"> إضافة جديد
                                                +</a>
                                        </th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($paginatedItems  as $section)
                                    <tr>
                                        <td>
                                            <img class="rounded-circle" width="50" height="50"
                                                src="{{ asset('uploads/' . $section->photo) }}" alt="Card image cap">
                                        </td>

                                        <td>
                                            <p>
                                                {{ $section->name }}
                                            </p>
                                        </td>

                                        <td>رئيسي</td>
                                        <td>
                                            @can('section.edit')
                                                <a href="{{ route('sections.edit', $section->id) }}">

                                                    <span class="text-black p-1 rounded-circle">

                                                        <i class="right fas text-lg  fa-pen"></i>


                                                    </span>
                                                </a>
                                            @endcan



                                            <a href="{{ route('sections.show', $section->id) }}">

                                                <span class=" text-info p-1 rounded-circle">
                                                    <i class="right fas bg-transparent text-lg fa-eye"></i>
                                                </span>
                                            </a>


                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    @foreach ($subSections as $subSection)
                                        @if ($subSection->main_section_id == $section->id)
                                            <tr id="{{ $section->id }}"
                                                class="pr-4 border-end
                                                ">
                                                <td>
                                                    <img class="rounded-circle" width="50" height="50"
                                                        src="{{ asset('uploads/' . $subSection->photo) }}"
                                                        alt="Card image cap">
                                                </td>
                                                <td>{{ $subSection->name }}</td>
                                                <td>فرعي</td>
                                                <td>
                                                    @can('section.edit')
                                                        <a href="{{ route('sections.edit', $subSection->id) }}">
                                                            <span class="text-black p-1 rounded-circle">
                                                                <i class="right fas text-lg  fa-pen"></i>
                                                            </span>
                                                        </a>
                                                    @endcan



                                                    <a href="{{ route('sections.show', $subSection->id) }}">
                                                        <span class=" text-info p-1 rounded-circle">
                                                            <i class="right fas bg-transparent text-lg fa-eye"></i>
                                                        </span>
                                                    </a>
                                                    @can('section.delete')
                                                        <span class=" rounded-circle  ">
                                                            <button wire:confirm="سيتم حذف هذا القسم "
                                                                wire:click="delete({{ $subSection->id }})"
                                                                class="bg-transparent border-transparent right fas text-lg text-danger fa-trash">
                                                            </button>
                                                        </span>
                                                    @endcan
                                                </td>
                                                @session('status')
                                                    <p role="alert" class="alert alert-danger  ">{{ __('lan.CantDelete') }}
                                                    </p>
                                                @endsession
                                                <td></td>


                                            </tr>
                                        @endif
                                    @endforeach
                                @empty
                                    <div class="d-flex col-sm-12 justify-content-center  flex-column">

                                        <div class="d-flex  justify-content-center mb-3 mt-5 align-items-center">

                                            <div class="text-danger pl-1">لا يوجد اقسام</div>
                                            <img width="50" src="{{ asset('admin/photo/seo.png') }}">
                                        </div>
                                        <button type="button" class="btn btn-primary"><a class="text-light"
                                                href="{{ route('sections.create') }}">اضافة</a>
                                        </button>
                                    </div>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="mt-4">
                    {{ $paginatedItems->links('pagination::bootstrap-4') }}
                </div>



            </div>
        </div> --}}
        {{-- <div>
            <div class="container">

                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="10px">صورة</th>
                                    <th>الأسم</th>
                                    <th>النوع</th>
                                    <th>خيارات</th>
                                    @can('section.create')
                                        <th>
                                            <a href="{{ route('sections.create') }}" class="btn btn-success btn-sm"> إضافة جديد
                                                +</a>
                                        </th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($paginatedItems as $item)
                                    <!-- Section Row -->
                                    @if ($item instanceof \App\Models\Section)
                                        <tr>
                                            <td>
                                                <img class="rounded-circle" width="50" height="50"
                                                    src="{{ asset('uploads/' . ($item->photo ?? 'default-photo.jpg')) }}"
                                                    alt="Card image cap">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>رئيسي</td>
                                            <td>
                                                @can('section.edit')
                                                    <a href="{{ route('sections.edit', $item->id) }}">
                                                        <span class="text-black p-1 rounded-circle">
                                                            <i class="right fas text-lg fa-pen"></i>
                                                        </span>
                                                    </a>
                                                @endcan

                                                <a href="{{ route('sections.show', $item->id) }}">
                                                    <span class="text-info p-1 rounded-circle">
                                                        <i class="right fas bg-transparent text-lg fa-eye"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Display SubSections for this Section -->
                                        @foreach ($paginatedItems as $subSection)
                                            @if ($subSection instanceof \App\Models\SubSection && $subSection->main_section_id == $item->id)
                                                <tr id="sub-{{ $subSection->id }}" class="pr-4 border-end">
                                                    <td>
                                                        <img class="rounded-circle" width="50" height="50"
                                                            src="{{ asset('uploads/' . ($subSection->photo ?? 'default-photo.jpg')) }}"
                                                            alt="Card image cap">
                                                    </td>
                                                    <td>{{ $subSection->name }}</td>
                                                    <td>فرعي</td>
                                                    <td>
                                                        @can('section.edit')
                                                            <a href="{{ route('sections.edit', $subSection->id) }}">
                                                                <span class="text-black p-1 rounded-circle">
                                                                    <i class="right fas text-lg fa-pen"></i>
                                                                </span>
                                                            </a>
                                                        @endcan

                                                        <a href="{{ route('sections.show', $subSection->id) }}">
                                                            <span class="text-info p-1 rounded-circle">
                                                                <i class="right fas bg-transparent text-lg fa-eye"></i>
                                                            </span>
                                                        </a>

                                                        @can('section.delete')
                                                            <button wire:confirm="سيتم حذف هذا القسم"
                                                                wire:click="delete({{ $subSection->id }})"
                                                                class="bg-transparent border-transparent right fas text-lg text-danger fa-trash">
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="text-danger">لا يوجد اقسام</div>
                                            <img width="50" src="{{ asset('admin/photo/seo.png') }}">
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4">
                    {{ $sections->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div> --}}
        <div>
            <div class="container">



                <div class="card">

                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="10px">صورة</th>
                                    <th>الأسم</th>
                                    <th>النوع</th>
                                    <th>خيارات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sections as $section)
                                    <!-- Display Main Section -->
                                    <tr>
                                        <td>
                                            <img class="rounded-circle" width="50" height="50"
                                                src="{{ asset('uploads/' . ($section->photo ?? 'default-photo.jpg')) }}"
                                                alt="Card image cap">
                                        </td>
                                        <td>{{ $section->name }}</td>
                                        <td>رئيسي</td>
                                        <td>
                                            @can('section.edit')
                                                <a href="{{ route('sections.edit', $section->id) }}">
                                                    <span class="text-black p-1 rounded-circle">
                                                        <i class="right fas text-lg fa-pen"></i>
                                                    </span>
                                                </a>
                                            @endcan

                                            <a href="{{ route('sections.show', $section->id) }}">
                                                <span class="text-info p-1 rounded-circle">
                                                    <i class="right fas bg-transparent text-lg fa-eye"></i>
                                                </span>
                                            </a>
                                            {{-- @can('section.delete')
                                                <button wire:confirm="سيتم حذف هذا القسم"
                                                    wire:click="delete({{ $section->id }})"
                                                    class="bg-transparent border-transparent right fas text-lg text-danger fa-trash">
                                                </button>
                                            @endcan --}}
                                        </td>
                                    </tr>

                                    <!-- Display SubSections under this Section -->
                                    @foreach ($subSections as $subSection)
                                        @if ($subSection->main_section_id == $section->id)
                                            <tr id="sub-{{ $subSection->id }}" class="pr-4 border-end">
                                                <td>
                                                    <img class="rounded-circle" width="50" height="50"
                                                        src="{{ asset('uploads/' . ($subSection->photo ?? 'default-photo.jpg')) }}"
                                                        alt="Card image cap">
                                                </td>
                                                <td>{{ $subSection->name }}</td>
                                                <td>فرعي</td>
                                                <td>
                                                    @can('section.edit')
                                                        <a href="{{ route('sections.edit', $subSection->id) }}">
                                                            <span class="text-black p-1 rounded-circle">
                                                                <i class="right fas text-lg fa-pen"></i>
                                                            </span>
                                                        </a>
                                                    @endcan

                                                    <a href="{{ route('sections.show', $subSection->id) }}">
                                                        <span class="text-info p-1 rounded-circle">
                                                            <i class="right fas bg-transparent text-lg fa-eye"></i>
                                                        </span>
                                                    </a>

                                                    {{-- @can('section.delete')
                                                        <button wire:confirm="سيتم حذف هذا القسم"
                                                            wire:click="deleteSubSection({{ $subSection->id }})"
                                                            class="bg-transparent border-transparent right fas text-lg text-danger fa-trash">
                                                        </button>
                                                    @endcan --}}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="text-danger">لا يوجد اقسام</div>
                                            <img width="50" src="{{ asset('admin/photo/seo.png') }}">
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination Links for Sections -->
                <div class="mt-4">
                    {{ $sections->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
