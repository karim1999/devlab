@extends('layouts.admin')
@section('content')
<div class="col-12 px-0 row" style="">
    <div class="col-12 col-lg-4 row mt-0 px-0">
        <div class="col-12   ">






            <div class=" col-12  row py-4 px-1 px-md-3 mt-2" style=" position: relative;background: #fff;border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;">
                <div class="col-12 px-0 row">
                    <div class="col-xl-6 col-lg-12 ">
                        <div class="text-center mt-2 py-4  px-2 row " style="border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;background:#fff">
                            <div class="col-3 text-left px-0">
                                <span class="fad fa-users" style="color: var(--bg-color-3);font-size: 30px;"></span>
                            </div>
                            <div class="col-9 text-left">
                                <h6 class="my-0 py-0 cairo font-1">عدد المستخدمين</h6>
                                <h6 class="my-0 py-0 cairo mt-2" style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">
                                    @php
                                    echo \App\User::get()->count();
                                    @endphp
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="text-center mt-2 py-4  px-2 row " style="border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;background:#fff">
                            <div class="col-3 text-left px-0">
                                <span class="fad fa-desktop" style="color: var(--bg-color-3);font-size: 30px;"></span>
                            </div>
                            <div class="col-9 text-left">
                                <h6 class="my-0 py-0 cairo font-1">عدد المواقع</h6>
                                <h6 class="my-0 py-0 cairo mt-2" style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">
                                    @php
                                    echo \App\Website::get()->count();
                                    @endphp

                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="text-center mt-2 py-4  px-2 row " style="border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;background:#fff">
                            <div class="col-3 text-left px-0">
                                <span class="fad fa-check" style="color: var(--bg-color-3);font-size: 30px;"></span>
                            </div>
                            <div class="col-9 text-left">
                                <h6 class="my-0 py-0 cairo font-1">ذات اولوية</h6>
                                <h6 class="my-0 py-0 cairo mt-2" style="font-size: 16px;letter-spacing: 2px;font-weight: bold;">
                                    @php
                                    echo \App\Website::where('periorety',true)->get()->count();
                                    @endphp

                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-12">
                        <div class="text-center mt-2 py-4  px-2 row " style="border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;background:#fff">
                            <div class="col-3 text-left px-0">
                                <span class="fad fa-info-circle" style="color: var(--bg-color-3);font-size: 30px;"></span>
                            </div>
                            <div class="col-9 text-left">
                                <h6 class="my-0 py-0 cairo font-1">حالة الموقع</h6>
                                <h6 class="my-0 py-0 cairo mt-2" style="font-size: 16px;letter-spacing: 0px;font-weight: bold;">
                                    @php
                                    $is_fixing = \App\Setting::get()->first();
                                    if(null!==$is_fixing&&$is_fixing['fixing']==0)
                                        echo "<span style='color:red'>تحت الصيانة</span>";
                                    else echo "<span style='color:green'>يعمل</span>";
                                    @endphp

                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" col-12  row py-4 px-1 px-md-3 mt-2" style=" position: relative;background: #fff;border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;">
                <div class="col-12 px-0">

                    <form method="POST" action="{{route('settings.update')}}">
                        @csrf
                         <div class="col-12 mb-3">
                             <div class="col-12 cairo">
                                 حالة الموقع <span style="color: red">*</span>
                             </div>
                             <div class="col-12 mt-2 row">
                                 <input type="hidden" name="fixing" value="false">
                                 <input type="checkbox" name="fixing" style="height: 25px;width: 25px;" class="d-inline-block"  {{$settings['fixing']=="1"?'checked="true"':''}} value="true">
                                 <span class="d-inline-block cairo mr-2" > يعمل </span>
                             </div>
                         </div>



                         <div class="col-12 mb-3">
                             <div class="col-12 cairo">
                                 التصميم
                             </div>
                             <div class="col-12 mt-2 row">
                                <select class="form-control" name="style">
                                    <option value="square" {{ ( $settings["style"]=="square") ? 'selected' : '' }}   >مربع</option>
                                    <option value="circle" {{ ( $settings["style"]=="circle") ? 'selected' : '' }}   >دائرة</option>
                                </select>

                             </div>
                         </div>

                         <div class="col-12 mb-3">
                             <div class="col-12 cairo">
                                 المواقع المعروضة
                             </div>
                             <div class="col-12 mt-2 row">
                                 <input class="form-control" name="number_of_sites"  autofocus="" type="number" value="{{$settings['number_of_sites']}}" min="1">
                             </div>
                         </div>







                         <div class="col-12 mb-3">
                             <div class="col-12 cairo">
                                 النص
                             </div>
                             <div class="col-12 mt-2 row">
                                 <textarea class="form-control" style="height: 250px" name="title">{{$settings['title']}}</textarea>
                             </div>
                         </div>
                         <div class="col-12 mb-3">
                             <div class="col-12 cairo">

                             </div>
                             <div class="col-12 mt-2 row">
                                 <button class="btn btn-success py-1 px-4">حفظ</button>
                             </div>
                         </div>
                     </form>


                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8 mt-2">
        <div class="col-12  row py-4 px-1 px-md-3" style=" position: relative;background: #fff;border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;">
            <div class="col-12   text-left px-0 py-2">
                <a href="{{route('website.create')}}">
               <span class="btn btn-primary py-1 px-4" style="border-radius: 20px!important">إضافة موقع</span>
               </a>
            </div>
            @php
            $websites=\App\Site::orderBy('id','DESC')->get();
            @endphp
            <table id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
                <thead>
                    <tr>
                        <th>الكود</th>
                        <th>إسم</th>
                        <th>رابط</th>
{{--                        <th>حالة</th>--}}
                        <th>نص</th>
                        <th>عملية</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($websites as $website)
                    <tr>
                        <td>{{$website->id}}</td>
                        <td>{{$website->title}}</td>
                        <td>{{$website->link}}</td>
{{--                        <td>{{$website->visible}}</td>--}}
                        <td>{{$website->description}}</td>
                        <td style="max-width: 100px">
                            <a href='{{route('website.edit',['id'=>$website->id])}}' data-toggle="tooltip" data-placement="bottom" title="تعديل">
                                <span class="far fa-edit"  style="font-size: 18px;color:  #007bff"></span>
                            </a>
                            <a href="#"   data-toggle="tooltip" data-placement="bottom" title="حذف" data-id="{{$website->id}}" class="remove-site">
                                <span class="far fa-trash-alt" style="font-size: 18px;color: #e00"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-12 "></div>
        </div>
    </div>
</div>
<div class=" col-12  row p-1   mt-2" style=" position: relative;background: #fff;border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;overflow: hidden;">
    <div class="col-12 px-0 row">
        <iframe src="{{env('APP_URL')}}" style="width: 100%;min-height: 100vh"></iframe>
    </div>
</div>
<form method="POST" action="{{route('website.remove')}}" id="remove-site-form" style="display: none;">@csrf <input type="hidden" name="id" value="" id="website-id-remove"></form>


<script type="text/javascript">
    $('.remove-site').on('click',function(){

        Swal.fire({
          title: 'هل انت متأكد من حذف الموقع',
          text: "سوف يتم حذف الموقع والبيانات الخاصة به هل تريد الاستمرار",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'حذف',
          cancelButtonText: 'إلغاء'
        }).then((result) => {
          if (result.value) {
            $('#website-id-remove').val($(this).data('id'));
            $('#remove-site-form').submit();
          }
        })

    });
</script>






@endsection
