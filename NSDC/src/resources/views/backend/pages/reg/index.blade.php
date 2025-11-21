@extends('backend.template.template')
@section('title', 'All Registrations')
@section('main')

    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Administration /</span>
        <span class="heading-color">Registrations</span>
    </h4>

    <div class="card">
        <div class="card-header">

            <div class="btn-group">
                <button class="btn filter-btn btn-secondary add-new btn-primary waves-effect waves-light">
                    <span><i class="ti ti-filter me-0 me-sm-1 ti-xs"></i>&nbsp; Filter </span>
                </button>
            </div>

        </div>

        <div class="card-body">

            {{-- FILTER FORM --}}
            <form class="dt_adv_search filter" method="get" action="{{ route('registration.index') }}" id="searchForm" style="display:none;">
                <div class="row">
                    <div class="col-12">
                        <div class="row g-3">

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control dt-input" placeholder="Name">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label class="form-label">From Date:</label>
                                <input type="date" name="from_date" class="form-control dt-input">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label class="form-label">To Date:</label>
                                <input type="date" name="to_date" class="form-control dt-input">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-end">
                                <div class="input-group-append me-2">
                                    <button id="search" class="btn btn-md btn-primary waves-effect waves-light index-search" type="button">
                                        <span><i class="ti ti-filter me-0 me-sm-1 ti-xs"></i>&nbsp; Filter </span>
                                    </button>
                                </div>

                                <div class="input-group-append">
                                    <button class="btn btn-md btn-danger waves-effect waves-light" onclick="resetForm()" type="reset">
                                        <span><i class="ti ti-square-x me-0 me-sm-1 ti-xs"></i>&nbsp; Clear </span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

        </div>

        {{-- TABLE DATA --}}
        <div id="filterTable">

            <div class="card-datatable table-responsive">
                <table class="datatables-products table item_table table-hover">
                    <thead class="border-top">
                    <tr>
                        <th>#</th>
                        <th>Reg Date</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($registrations as $reg)
                        <tr id="deleteitem_remove_{{ $reg->id }}">
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $reg->created_at->format('d M Y') }}</td>

                            <td>
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($reg->photo) }}"
                                     width="50" height="50" style="object-fit:cover; border-radius:6px;">
                            </td>

                            <td>{{ $reg->name }}</td>
                            <td>{{ $reg->email }}</td>
                            <td>{{ $reg->phone }}</td>
                            <td>{{ $reg->course->title ?? 'N/A' }}</td>

                            <td>
                                <div class="d-inline-block text-nowrap">
                                    <a href="">
                                        <button class="btn btn-sm btn-icon edit-i">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

            <div class="d-flex justify-content-center mb-2">
                {{ $registrations->links('backend.pagination.custome') }}
            </div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $('#search').on('click', function() {
            var formData = $('#searchForm').serialize();

            $.ajax({
                type: 'GET',
                url: '{{ route("registration.index") }}',
                data: formData,
                success: function(response) {
                    $('#filterTable').html(response);
                }
            });
        });

        function resetForm() {
            $('#searchForm')[0].reset();
            $('#search').click();
        }
    </script>
@endpush
