<!DOCTYPE html>
<html lang="en">
<!---------------------BEGIN: Head------------------->
    @include('frontend.includes.head')

<!---------------------END: Head---------------------->

<body>
    <div class="page-wrapper">


      <!-------------------BEGIN: Main Menu------------------------>
      {{--@include('frontend.includes.header')--}}
        @yield('header')
     <!-- ----------------END: Main Menu-------------------------->



             @yield('content')


      <!--------------------BEGIN: Footer---------------------------->
      @include('frontend.includes.footer')
      <!--------------------END: Footer----------------====---------->


        <!--------------------BEGIN: JS---------------------------->
        @include('frontend.includes.script')
        <!--------------------END: JS----------------====---------->
    </div>
    <a class="whatsapp-float" href="https://wa.me/8801725537792?text=Hi%2C%20I%20have%20a%20query"
       target="_blank"
       rel="noopener"
       aria-label="Contact us on WhatsApp"
       title="Contact us on WhatsApp">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="">
    </a>
</body>
</html>
