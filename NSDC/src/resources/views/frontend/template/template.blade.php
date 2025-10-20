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
    <a href="https://wa.me/8801332550542?text=Hi%2C%20I%20have%20a%20query"
       target="_blank"
       style="position: fixed; bottom: 20px; right: 20px; background-color: #075a26; color: white; border-radius: 50px; padding: 15px 20px; text-align: center; z-index: 1000; box-shadow: 0px 4px 6px rgba(0,0,0,0.2); display: flex; align-items: center; text-decoration: none;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width: 30px; height: 30px; margin-right: 10px;">
        <span style="font-size: 18px; font-weight: bold;">Contact Us</span>
    </a>
</body>
</html>

