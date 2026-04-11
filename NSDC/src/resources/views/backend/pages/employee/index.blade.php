@extends('backend.template.template')

@section('title','Employees')

@section('main')

    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Employees /</span>
        <span class="heading-color">All Employees</span>
    </h4>

    <div class="card">

        <div class="card-header d-flex justify-content-between">

            <h5 class="mb-0">Employee List</h5>

            <!-- Create Button -->
            <button type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#createModal">
                <i class="ti ti-plus"></i> Add Employee
            </button>

        </div>
    <div class="filterTable">
        <div class="card-datatable table-responsive">
            <table class="datatables-products table item_table table-hover" id="sortable-table">
                <thead>
                <tr>
                    <th width="40">#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th width="120">Status</th>
                    <th width="150">Action</th>
                </tr>
                </thead>

                <tbody id="sortable">

                @foreach($employees as $employee)

                    <tr data-id="{{ $employee->id }}">

                        <td class="drag-handle" style="cursor: move">
                            <i class="ti ti-arrows-move"></i>
                        </td>

                        <td>
                            <img src="{{ Storage::url($employee->image) }}"
                                 width="50">
                        </td>

                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->designation }}</td>
                        <td>{{ $employee->email }}</td>

                        <td>
                            @if($employee->status==1)
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-danger">Inactive</span>
                            @endif
                        </td>

                        <td>

                            <button
                                type="button"
                                class="btn btn-sm btn-icon edit-i"
                                data-toggle="modal"
                                data-target="#editModal{{$employee->id}}">
                                <i class="ti ti-edit"></i>
                            </button>
                            <button  id="confirm-text_{{$employee->id}}"  class="btn btn-sm btn-icon delete-record delete-i">
                                <i onClick="deleteConfirmation({{$employee->id}},'{{ route("employee.destroy", $employee->id) }}')" class="ti ti-trash"></i>
                            </button>


                        </td>

                    </tr>


                    <!-- EDIT MODAL -->
                    <div class="modal fade" id="editModal{{$employee->id}}">
                        <div class="modal-dialog">
                            <form method="POST"
                                  action="{{route('employee.update',$employee->id)}}"
                                  enctype="multipart/form-data">

                                @csrf

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5>Edit Employee</h5>
                                    </div>

                                    <!-- Name -->
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name', $employee->name) }}"
                                           class="form-control mb-1 @error('name') is-invalid @enderror"
                                           placeholder="Name">

                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror


                                    <!-- Designation -->
                                    <input type="text"
                                           name="designation"
                                           value="{{ old('designation', $employee->designation) }}"
                                           class="form-control mb-1 @error('designation') is-invalid @enderror"
                                           placeholder="Designation">

                                    @error('designation')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror


                                    <!-- Email -->
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email', $employee->email) }}"
                                           class="form-control mb-1 @error('email') is-invalid @enderror"
                                           placeholder="Email">

                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror


                                    <!-- Image -->
                                    <input type="file"
                                           name="image"
                                           class="form-control mb-1 @error('image') is-invalid @enderror">

                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                        <select name="status" class="form-control">
                                            <option value="1" {{$employee->status==1?'selected':''}}>Active</option>
                                            <option value="0" {{$employee->status==0?'selected':''}}>Inactive</option>
                                        </select>

                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>

    </div>



    <!-- CREATE MODAL -->
    <div class="modal fade" id="createModal">
        <div class="modal-dialog">
            <form method="POST"
                  action="{{route('employee.store')}}"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <h5>Add Employee</h5>
                    </div>

                    <div class="modal-body">

                        <input type="text"
                               name="name"
                               class="form-control mb-2"
                               placeholder="Name">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input type="text"
                               name="designation"
                               class="form-control mb-2"
                               placeholder="Designation">
                        @error('designation')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input type="email"
                               name="email"
                               class="form-control mb-2"
                               placeholder="Email">

                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <input type="file"
                               name="image"
                               class="form-control mb-2">
                               <p>150*225</p>
                               

                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>

                        @error('status')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
@push('script')

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @if ($errors->any())
        <script>
            $(document).ready(function(){
                $('#createModal').modal('show');
            });
        </script>
    @endif
    <script>

        $("#sortable").sortable({

            handle: ".drag-handle",

            update: function(){

                let order = [];

                $('#sortable tr').each(function(index){

                    order.push({
                        id: $(this).data('id'),
                        position: index + 1
                    });

                });

                $.ajax({
                    url:"{{route('employee.order_update')}}",
                    method:"POST",
                    data:{
                        order:order,
                        _token:"{{csrf_token()}}"
                    }
                });

            }
        });
    </script>

@endpush
