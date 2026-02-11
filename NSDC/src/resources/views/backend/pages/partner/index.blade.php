@extends('backend.template.template')
@section('title','Our Partners')

@section('main')
    <div class="d-flex justify-content-between mb-3">
        <h4>Our Partners</h4>
        <button class="btn btn-primary" data-toggle="modal" data-target="#createPartnerModal">
            <i class="ti ti-plus"></i> Add New Partner
        </button>
    </div>

    <div class="filterTable">
        <div class="card-datatable table-responsive">
            <table class="datatables-products table item_table table-hover">
                <thead>
                <tr>
                    <th style="width:50px;">Order</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="sortable">
                @foreach($partners as $partner)
                    <tr id="item_{{ $partner->id }}">
                        <td class="text-center cursor-move">
                            <i class="fas fa-arrows-alt"></i>
                        </td>
                        <td>
                            <img src="{{ asset('storage/'.$partner->logo) }}" style="width:120px;height:60px;object-fit:cover;border:1px solid #ddd;padding:2px;">
                        </td>
                        <td>
                            @if($partner->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-inline-block">
                                <button  id="confirm-text_{{$partner->id}}"  class="btn btn-sm btn-icon delete-record delete-i"><i onClick="deleteConfirmation({{$partner->id}},'{{ route("partner.destroy", $partner->id) }}')" class="ti ti-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-2">
        {{ $partners->links('backend.pagination.custome') }}
    </div>

    <!-- Create Partner Modal -->
    <div class="modal fade" id="createPartnerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('partner.store') }}" enctype="multipart/form-data" class="modal-content" id="partnerForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Partner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalCloseBtn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Partner Logo -->
                    <div class="mb-3">
                        <label>Partner Logo <span class="text-danger">*</span></label>
                        <input type="file" name="logo" class="form-control" id="logoInput" accept="image/*" required>
                        <div class="mt-2">
                            <img id="logoPreview" src="{{ asset('image/no-image-uploded-2.png') }}" style="width:120px;height:60px;object-fit:cover;border:1px solid #ddd;">
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label>Status</label><br>
                        <input type="radio" name="status" value="1" checked required> Active
                        <input type="radio" name="status" value="0"> Inactive
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelPartnerBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        $(document).ready(function(){

            // Image preview
            $('#logoInput').on('change', function(e){
                let reader = new FileReader();
                reader.onload = function(event){
                    $('#logoPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });

            // Reset form when cancel or modal close clicked
            $('#cancelPartnerBtn, #modalCloseBtn').on('click', function(){
                let form = $('#partnerForm')[0];
                form.reset();
                $('#logoPreview').attr('src', "{{ asset('image/no-image-uploded-2.png') }}");
            });

            // Drag & Drop Sortable
            var sortable = Sortable.create(document.getElementById('sortable'), {
                handle: '.cursor-move',
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function(evt){
                    let order = [];
                    $('#sortable').children('tr').each(function(index, element){
                        order.push({
                            id: $(element).attr('id').replace('item_',''),
                            position: index+1
                        });
                    });

                    $.post("{{ route('partner.order_update') }}", {
                        order: order,
                        _token: "{{ csrf_token() }}"
                    }, function(data){
                        console.log('Order updated', data);
                    });
                }
            });

        });
    </script>

    <style>
        .cursor-move { cursor: move; }
        .sortable-ghost { opacity: 0.5; }
    </style>
@endpush
