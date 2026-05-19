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
       aria-label="Contact us on WhatsApp"
       style="position: fixed; bottom: 24px; right: 24px; background: linear-gradient(135deg, #25D366 0%, #128C7E 100%); color: white; border-radius: 999px; padding: 10px 18px 10px 10px; text-align: left; z-index: 1000; box-shadow: 0 14px 34px rgba(18, 140, 126, 0.32); display: flex; align-items: center; gap: 11px; text-decoration: none; border: 1px solid rgba(255,255,255,0.55);">
        <span style="width: 46px; height: 46px; border-radius: 50%; background: #fff; display: inline-flex; align-items: center; justify-content: center; box-shadow: inset 0 0 0 1px rgba(18,140,126,0.12); flex: 0 0 auto;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width: 28px; height: 28px;">
        </span>
        <span style="display: flex; flex-direction: column; line-height: 1.15;">
            <span style="font-size: 13px; font-weight: 500; opacity: 0.88;">WhatsApp</span>
            <span style="font-size: 15px; font-weight: 700; white-space: nowrap;">Contact Us</span>
        </span>
    </a>
</body>
</html>
