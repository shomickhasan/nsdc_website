@extends('backend.template.template')
@section('title', 'Hero Slider')
@section('main')
    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Hero Slider /</span>
        <span class="heading-color">All Sliders</span>
    </h4>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('hero_slider.create') }}" style="color: white;">
                <button class="btn btn-secondary add-new btn-primary waves-effect waves-light">
                <span>
                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                    <span class="d-none d-sm-inline-block">Create Slider</span>
                </span>
                </button>
            </a>
        </div>

        <div id="filterTable">
            <div class="card-datatable table-responsive">
                <table class="table table-hover item_table">
                    <thead class="border-top">
                    <tr>
                        <th style="width:50px;">Order</th>
                        <th>Title</th>
                        <th>Picture</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="sortable">
                    @foreach ($sliders as $slider)
                        <tr id="item_{{ $slider->id }}">
                            {{-- Drag & Drop Handle --}}
                            <td class="text-center cursor-move">
                                <i class="fas fa-arrows-alt"></i>
                            </td>

                            {{-- Title --}}
                            <td>{{ $slider->title }}</td>

                            {{-- Image --}}
                            <td>
                                <img src="{{ asset('storage/'.$slider->image) }}"
                                     style="width:150px; height:80px; object-fit:cover; border:1px solid #ddd; padding:2px;">
                            </td>

                            {{-- Status Badge --}}
                            <td>
                                @if($slider->status == 1)
                                    <span class="badge bg-label-success">Active</span>
                                @else
                                    <span class="badge bg-label-danger">Inactive</span>
                                @endif
                            </td>

                            {{-- Action --}}
                            <td>
                                <div class="d-inline-block text-nowrap">
                                    <a href="{{ route('hero_slider.edit', $slider->id) }}">
                                        <button class="btn btn-sm btn-icon edit-i"><i class="ti ti-edit"></i></button>
                                    </a>

{{--                                    <form action="" method="POST"--}}
{{--                                          style="display:inline-block;"--}}
{{--                                          onsubmit="return confirm('Are you sure you want to delete this slider?');">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button class="btn btn-sm btn-icon delete-i">--}}
{{--                                            <i class="ti ti-trash"></i>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mb-2">
                {{ $sliders->links('backend.pagination.custome') }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- Drag & Drop future ready (SortableJS) --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script>
        var sortable = Sortable.create(document.getElementById('sortable'), {
            handle: '.cursor-move',
            animation: 150,
            onEnd: function (evt) {
                let order = [];
                $('#sortable tr').each(function(index, element){
                    order.push({
                        id: $(element).attr('id').replace('item_',''),
                        position: index + 1
                    });
                });

                // AJAX POST request
                $.ajax({
                    url: "{{ route('hero_slider.order_update') }}",
                    method: "POST",
                    data: {
                        order: order,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if(response.status === 'success'){
                            console.log(response.message);
                        } else {
                            console.log('Error updating order');
                        }
                    },
                    error: function(xhr){
                        console.log('AJAX Error:', xhr);
                    }
                });
            }
        });
    </script>
@endpush
