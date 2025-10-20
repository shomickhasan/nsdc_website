
<script src="{{asset('/')}}frontend/js/jquery.js"></script>
<script src="{{asset('/')}}frontend/js/popper.min.js"></script>
<script src="{{asset('/')}}frontend/js/main-slider-script.js"></script>
<script src="{{asset('/')}}frontend/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}frontend/js/jquery.fancybox.js"></script>
<script src="{{asset('/')}}frontend/js/jquery-ui.js"></script>
<script src="{{asset('/')}}frontend/js/wow.js"></script>
<script src="{{asset('/')}}frontend/js/appear.js"></script>
<script src="{{asset('/')}}frontend/js/select2.min.js"></script>
<script src="{{asset('/')}}frontend/js/swiper.min.js"></script>
<script src="{{asset('/')}}frontend/js/owl.js"></script>
<script src="{{asset('/')}}frontend/js/script.js?v=1.1"></script>

<!-- Toastr -->
<script src="{{asset('/')}}app-assets/vendor/libs/toastr/toastr.js"></script>

<script src="{{asset('/')}}app-assets/vendor/libs/toastr/toastr.js"></script>
<script src="{{asset('/')}}app-assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="{{asset('/')}}app-assets/js/extended-ui-sweetalert2.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-F4GNN8Z1E7"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);} gtag('js', new Date());
     gtag('config', 'G-F4GNN8Z1E7');



</script>
</script>
<script>
    function trackLeadEvent() {
        // Track the "Lead" event when the button is clicked
        fbq('track', 'Book a Consulation');
    }
</script>
<!-- Mobile Menu Functions -->


<!-- Custom Script Push-->
@stack('script')

<script>


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //toster initilaxitions
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif

    function incrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
    } else {
    parent.find('input[name=' + fieldName + ']').val(0);
    }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
        parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
        parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    $('.input-group').on('click', '.button-plus', function(e) {
    incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
    decrementValue(e);
    });

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#consultationId').submit(function (e) {
            fbq('track', 'Lead');
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                success: function (response) {
                    $('#exampleModal').modal('hide');
                    $('#consultationId')[0].reset();
                    $('#consultationId .is-invalid').removeClass('is-invalid');
                    $('#consultationId .invalid-feedback').html('');
                    fbq('track', 'Complete registration');
                    Swal.fire({
                        title: 'Thank you for your consultation request!',
                        text: 'We will get back to you shortly and look forward to connecting with you soon!',
                        icon: 'success',
                        customClass: {
                        confirmButton: 'btn btn-success waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $('#consultationId .is-invalid').removeClass('is-invalid');
                        $('#consultationId .invalid-feedback').html('');
                        $.each(errors, function (key, value) {
                            var inputField = $('#consultationId [name="' + key + '"]'); // Restrict to #consultationId
                            if (inputField.length) {
                                inputField.addClass('is-invalid');
                                inputField.siblings('.invalid-feedback').html(value[0]);
                            }
                        });
                    }
                }
            });
        });

        $('#contact_form').submit(function (e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                success: function (response) {
                    $('#contact_form')[0].reset();
                    $('#contact_form .is-invalid').removeClass('is-invalid');
                    $('#contact_form .invalid-feedback').html('');

                    Swal.fire({
                        title: 'Thank you for subscribing to Otithi!',
                        text: '',
                        icon: 'success',
                        customClass: {
                        confirmButton: 'btn btn-success waves-effect waves-light'
                        },
                        buttonsStyling: false
                    });
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $('#contact_form .is-invalid').removeClass('is-invalid');
                        $('#contact_form .invalid-feedback').html('');
                        $.each(errors, function (key, value) {
                            var inputField = $('#contact_form [name="' + key + '"]');
                            if (inputField.length) {
                                inputField.addClass('is-invalid');
                                inputField.siblings('.invalid-feedback').html(value[0]);
                            }
                        });

                        let errorMessages = '<ul>'; // Start an unordered list
                        $.each(errors, function (field, messages) {
                            errorMessages += '<li style="color: red;">' + messages[0] + '</li>';
                        });

                        errorMessages += '</ul>'; // Close the unordered list
                        $('#subsribeModel .modal-body').html(errorMessages);
                        $('#subsribeModel').modal('show');
                    }
                }
            });
        });
    });



</script>

<script>
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    });
</script>

