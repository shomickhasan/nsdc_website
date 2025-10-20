@extends('backend.template.template')
@section('title', 'List Users')
@section('main')
   {{-- <section class="mb-1">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">List Users</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active"> Administration
                    </li>
                    <li class="breadcrumb-item active"> List Users
                    </li>
                </ol>
            </div>
            <div class="col-12 top_btn">
                <div class="btn-group">
                    <a href="{{route('users.add_edit')}}" class="btn btn-outline-primary"><span><i class="feather icon-plus"></i>&nbsp; Add New</span></a>
                </div>
            </div>
        </div>
    </section>--}}
    {{--<form id="filterForm" onsubmit="return false">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="query" placeholder="Enter User Name">
                </div>
            </div>
            <div class="col-md-2">
                <button  id="search" class="btn btn-dark">Search</button>
            </div>
        </div>
    </form>--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped datatable table-condensed" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Group</th>
                                    <th>Type</th>
                                    <th>Message</th>
                                    <th>User</th>
                                    <th>Date Time</th>

                                </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
@push('script')
    <script>

        $(document).ready(function () {
            let query = null;

            /*$('#search').click(function () {
                query = $('#query').val();
                if (query !== null) {
                    DataLoad(query);
                }
            });*/

            function DataLoad(query = null) {
                let dataTable = $('.datatable').DataTable({
                    scrollX: false,
                    "searching": false,
                    buttons: [],
                    dom: 'Bfrtip',
                    'processing': true,
                    'serverSide': true,
                    'ajax': {
                        url: '{{ route("activityLog.index") }}',
                        type: "GET",
                        data: {
                            'query': query,
                        },
                    },
                    order: [[0, 'desc']],
                    responsive: true,
                    'columns': [
                        {
                            data: 'status',
                            name: 'status',
                            searchable: true,
                        },
                        {
                            data: 'group',
                            name:'group',
                            searchable: true,
                        },
                        {
                            data: 'activity_type',
                            name:'activity_type',
                            searchable: true ,
                        },
                        {
                            data: 'message',
                            name:'message',
                            searchable: true ,
                        },
                        {
                            data: 'creator.full_name',
                            searchable: true ,
                        },
                        {
                            data: 'formated_date',
                            name:'formated_date',
                            searchable: true ,
                        },


                    ],
                });
            }

            DataLoad();
        });

    </script>
@endpush
