@extends('backend.template.template')
@section('title', __('menu.fields'))
@push('css')

@endpush
@section('main')

<div class="row mb-2">
    <div class="col">
        <h4 class="py-3 mb-4 fs-5 d-inline">
            <span class="text-muted fw-light">{{ __('menu.fields') }}</span>
        </h4>
    </div>
</div>
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('fields.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-6">
                            <div class="row">
                                @foreach ($fields as $item)
                                    <div class="col-md-12 mb-3">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label text-sm-end" for="full-name">{{ __('fields.filed_name') }}</label>
                                            <div class="col-sm-9">
                                                <input name="{{ $item->name }}" type="text" class="form-control @error($item->name) is-invalid @enderror"
                                                    id="full-name" placeholder="{{ __('fields.filed_name') }}" value="{{ old($item->name, $item->lable_name) }}" />
                                                
                                                @error($item->name)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="row">
                                @foreach ($fields as $item)
                                    <div class="col-md-12 mb-3">
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label text-sm-end" for="full-name">{{ __('fields.input_box') }}</label>
                                            <div class="col-sm-9">
                                                <input name="" type="text" class="form-control" disabled
                                                    id="full-name" placeholder="{{ __('fields.input_box') }}" value="Text" />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="row justify-content-end">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">{{ __('common.submit.button') }}</button>

                                    <button type="reset" class="btn btn-label-secondary waves-effect">{{ __('common.cancle.button') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Basic with Icons -->

</div>


@endsection
@push('script')
<script>
    $(document).ready(function() {

        var selectDivision = $('#divisionId').val();
        var selectedDistrict = "{{ old('district_id') }}";
        var currentLocale = "{{ app()->getLocale() }}";

        $('#divisionId').change(function () {
            var divisionId = $(this).val();
            var url = '{{ route("district.response") }}';
            $('#districtId').empty();
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    division_id: divisionId,
                },
                success: function (response) {
                    var res = '<option value="">Select Entrepreneur District</option>';
                    if(response.status === 'success'){
                        $.each(response.data, function(index, value) {
                            var districtName = currentLocale === 'bn' ? value.bn_name : value.name;
                            res += `<option value="${value.id}"> ${districtName}</option>`;
                        });
                    }
                    $('#districtId').html(res);
                    if (selectedDistrict) {
                        $('#districtId').val(selectedDistrict).trigger('change');
                    }
                },
                error: function (error) {

                }
            });
        });
        $('#divisionId').val(selectDivision).trigger('change');
    });
</script>
@endpush
