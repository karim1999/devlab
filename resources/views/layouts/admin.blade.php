<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <?php $assets_version='?v='.time(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="@isset($meta_description)
            {{ $meta_description }} 
        @endisset">
    <link rel="icon" type="image/png" href="{{env('PUBLIC_PATH')}}/site_images/fav-icon.png" />
    <meta name="keywords" content="">
    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal|Almarai|Markazi+Textdisplay=swap" rel="stylesheet">
    <!-- Styles -->
   {{--  <link href="{{ asset(env('PUBLIC_PATH').'css/app.css') }}" rel="stylesheet"> --}}
    {{-- <script src="resources/js/app-client.js"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.css">
    <!--cdns-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

<body style="background: #f1f1f1!important">
 
    {{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLG25FH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> --}}
    



    


    <!-- Button trigger modal -->
 
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">   تغيير كلمة المرور</h5>
         
      </div>
      <form method="POST" action="{{route('user.update-password')}}" class="col-12 px-0" id="change-password-form">
        @csrf
      <div class="modal-body">
        
            <div class="form-group row mb-4">
                <label for="email" class="col-md-12 col-form-label text-md-right">البريد الالكتروني</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{\Auth::user()->email}}" required autocomplete="email"  > 
                </div>
            </div>
          


            <div class="form-group row mb-4">
                <label for="email" class="col-md-12 col-form-label text-md-right">كلمة المرور الجديدة</label>

                <div class="col-md-12">
                    <input id="new_password" type="password" class="form-control" name="new_password"  required   > 
                </div>
            </div>
            <div class="form-group row mb-4">
                <label for="email" class="col-md-12 col-form-label text-md-right">تاكيد المرور الجديدة</label>

                <div class="col-md-12">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  required   > 
                </div>
            </div>

         
      </div>
      <div class="modal-footer">
        <span type="button" class="btn btn-secondary mx-2" data-dismiss="modal" >إغلاق</span>
        <button type="button" class="btn btn-primary mx-2" onclick="$('#change-password-form').submit()"> تغيير كلمة المرور</button>
      </div>
      </form>
    </div>
  </div>
</div>


    @include('layouts.alert')


    @if(\Auth::check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endif
    

    <div class="col-12 px-0 row "> 
       {{--  <div class="admin-right-nav">
                
        </div>  --}}
        <div class="admin-main-container" style="background: #f5f5f5;"> 
            <div class="admin-top-nav" style="box-shadow: 0px 0px 12px #ddd!important">
            <div class="col-12 px-0 row">
                <div class="col-6">
                    <a href="{{route('dashboard')}}">
                    <span class="d-inline-block" style="width: 50px;">
                        <span class="fal fa-home" style="padding: 10px 5px;font-size: 29px;"></span>
                        {{-- <div class="dropdown">
                          <button class="btn p-0  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{env('PUBLIC_PATH')}}/site_images/user.png" style="width: 50px;border-radius: 50%!important;padding: 10px;height: 50px;" alt="الصورة الشخصية">
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" onclick="$('#logout-form').submit()" style="cursor: pointer;">تسجيل خروج</a>
                            
                          </div>
                        </div> --}}
                    </span>
                    </a>

                </div>
                <div class="col-6 text-left  row px-0" style="justify-content: flex-end">
                    <span class="d-inline-block" style="width: 50px;">
                        <div class="dropdown">
                          <button class="btn p-0  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{env('PUBLIC_PATH')}}/site_images/user.png" style="width: 50px;border-radius: 50%!important;padding: 10px;height: 50px;" alt="الصورة الشخصية">
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="border:1px solid #999">


                            
                            <a class="dropdown-item"   style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">تغيير كلمة المرور</a>

                            <a class="dropdown-item" onclick="$('#logout-form').submit()" style="cursor: pointer;">تسجيل خروج</a>
                            
                          </div>
                        </div>
                    </span>
                </div>
            </div>
             </div>  
            <div class="col-12 px-0 admin-main-content " style="margin-top: 50px!important">
                @yield('content')
            </div>
        </div>
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
          /*.admin-main-container{
                width: calc(100% - 250px)!important;

             }
             .admin-right-nav{
                background: #1b2430;
                width: 250px;
                height: calc(100vh);
            }*/
            /*.admin-top-nav{
                width: calc(100% - 250px)!important;
            }*/
          
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
 
    <script src="{{env('PUBLIC_PATH')}}/js/table.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>


    <script type="text/javascript">
    (function() {


        $('#myTable').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [50, 100, 150, -1],
                ['50 صف', '100 صف', '150 صف', 'عرض الكل']
            ],

            buttons: [ 
                {
                    extend: 'print',
                    text: 'طباعة وتصدير PDF',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                },
            ],


            "language": {

                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                buttons: {
                    pageLength: {
                        _: "عرض %d عناصر",
                        '-1': "Tout afficher"
                    }
                }
            },
            responsive: true,
            scrollY: 300,
            paging: false
        });

    })();
</script>
</body>

</html>
