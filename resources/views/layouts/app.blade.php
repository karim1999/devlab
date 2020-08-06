<!doctype html>
<html lang="ar" dir="rtl">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php $assets_version='?v='.time(); ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="@isset($meta_description)
            {{ $meta_description }} 
        @endisset">
    {{-- <link rel="icon" type="image/png" href="{{env('PUBLIC_PATH')}}/site_images/fav-icon.png" /> --}}
    <meta name="keywords" content="">
    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal|Almarai|Markazi+Textdisplay=swap" rel="stylesheet">
    <!-- Styles -->
   {{--  <link href="{{ asset(env('PUBLIC_PATH').'css/app.css') }}" rel="stylesheet"> --}}
    {{-- <script src="resources/js/app-client.js"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.css">
    <!--cdns-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/css/tinytoggle.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" integrity="sha256-e47xOkXs1JXFbjjpoRr1/LhVcqSzRmGmPqsrUQeVs+g=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.css" integrity="sha256-T5/YPWWmrQkAXsPhJTeiO+s0DNAX/Oh0nhOL/rUw2mg=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/css/custom-fonts.css">
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/css/viewbox.min.css">
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/css/main.css{{$assets_version}}">
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/css/fontawsome.min.css">
 
</head>

<body style="background: #fff!important">
 
    {{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLG25FH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> --}}
    

    @include('layouts.alert')
 
            <div class="col-12 px-0 admin-main-content py-5 my-5 px-0 ">
                @yield('content')
            </div>
       
    <style type="text/css">
        .admin-top-nav{
            background: #fff;
            height: 50px;
            border-bottom: 1px solid #ddd;
            position: fixed;
            width: 100%;
            z-index: 123;

           
        }
        .admin-main-content{
            margin-top: 55px;
        }
        
        .admin-main-container
        {
            min-height: 100vh;
            width: 100%;
            background: #f9f9f9;
            position: relative;

        }
        @media (min-width: 544px) {
    
        } 
        @media (min-width: 768px) { 
            
        } 
        @media (min-width: 992px) {
          .admin-main-container{
                width: calc(100% - 250px)!important;

             }
             .admin-right-nav{
                background: #1b2430;
                width: 250px;
                height: calc(100vh);
            }
            .admin-top-nav{
                width: calc(100% - 250px)!important;
            }
          
        } 
        @media (min-width: 992px) {
         
        } 
        *,button:focus{
            outline: none!important;
            box-shadow: unset!important;
            border-radius: 0px!important
        }
    </style>
 





    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
    <script src="{{env('PUBLIC_PATH')}}/js/placejs.min.js"></script>

    <script src="{{env('PUBLIC_PATH')}}/js/jquery.viewbox.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
    <script src="https://wowjs.uk/dist/wow.min.js"></script>
    <script type="text/javascript" src="{{env('PUBLIC_PATH')}}/js/jquery.tinytoggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js"></script>
 
    <!-- Load Facebook SDK for JavaScript -->
  
    <script type="text/javascript" src="{{env('PUBLIC_PATH')}}/js/main.js{{$assets_version}}"></script>
    <script type="text/javascript">
    $('.cust-alert,.cust-alert-front').click(function() {
        $(this).hide('slow');
    });
    setTimeout(function() { $('.cust-alert').slideUp('slow'); }, 7000); 
    </script>
    <script type="text/javascript">
    $('.help-boat-nav-icon').on('click', function() {
        $(this).toggleClass('active');
        $('.help-boat-nav').slideToggle();
    }); 
    </script>


    


</body>

</html>
