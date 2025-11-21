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
                        <img src="{{ asset($reg->photo) }}"
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
