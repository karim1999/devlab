@extends('layouts.admin')
@section('content')
<div class="col-12 px-0 row" style="">
    <div class="col-12 col-lg-12 row mt-0 px-0">
        <div class="col-12   ">
            <form method="POST" action="{{route('website.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$website->id}}">
            <div class=" col-12  row py-4 px-1 px-md-3 mt-2" style=" position: relative;background: #fff;border-radius: 8px!important;box-shadow: 0px 0px 10px #ddd!important;">
                <div class="col-12 col-lg-4 px-0">
{{--                     <div class="col-12 mb-3">--}}
{{--                         <div class="col-12 cairo">--}}
{{--                             حالة الموقع <span style="color: red">*</span>--}}
{{--                         </div>--}}
{{--                         <div class="col-12 mt-2 row">--}}
{{--                             <input type="hidden" name="visible" value="false">--}}
{{--                             <input type="checkbox" name="visible" style="height: 25px;width: 25px;" class="d-inline-block"  value="true" {{ ($website->visible=="1")? "checked":""}}>--}}
{{--                             <span class="d-inline-block cairo mr-2" > يعمل </span>--}}
{{--                         </div>--}}
{{--                     </div>--}}
                     <div class="col-12 mb-3">
                         <div class="col-12 cairo">
                             اسم الموقع <span style="color: red">*</span>
                         </div>
                         <div class="col-12 mt-2 row">
                             <input type="" name="title"  class="form-control" autofocus="" required="" value="{{$website->title}}">

                         </div>
                     </div>
                     <div class="col-12 mb-3">
                         <div class="col-12 cairo">
                             شعار الموقع <span style="color: red">*</span> <span class="d-inline-block">
{{--                                 <img src="{{env('PUBLIC_PATH')}}/uploads/{{$website->logo_path}}" style="width: 30px;height: 30px;box-shadow: 0px 0px 10px #ddd!important;border-radius: 5px!important">--}}
                                 <img src="{{$website->logo_path}}" style="width: 30px;height: 30px;box-shadow: 0px 0px 10px #ddd!important;border-radius: 5px!important">
                             </span>
                         </div>
                         <div class="col-12 mt-2 row">
                             <input type="file" name="logo_path"  class="form-control p-1"  >

                         </div>
                     </div>
                     <div class="col-12 mb-3">
                         <div class="col-12 cairo">
                             ايقونة الموقع <span style="color: red">*</span> <span class="d-inline-block">
{{--                                 <img src="{{env('PUBLIC_PATH')}}/uploads/{{$website->icon_path}}" style="width: 30px;height: 30px;box-shadow: 0px 0px 10px #ddd!important;border-radius: 5px!important">--}}
                                 <img src="{{$website->icon_path}}" style="width: 30px;height: 30px;box-shadow: 0px 0px 10px #ddd!important;border-radius: 5px!important">
                             </span>
                         </div>
                         <div class="col-12 mt-2 row">
                             <input type="file" name="icon_path"  class="form-control p-1"  >

                         </div>
                     </div>
                     <div class="col-12 mb-3">
                         <div class="col-12 cairo" >
                             رابط الموقع <span style="color: red">*</span>
                         </div>
                         <div class="col-12 mt-2 row">
                             <input type="" name="link"  class="form-control"  required="" value="{{$website->link}}">

                         </div>
                     </div>
{{--                     <div class="col-12 mb-3">--}}
{{--                         <div class="col-12 cairo">--}}
{{--                            ذو اولوية--}}
{{--                         </div>--}}
{{--                         <div class="col-12 mt-2 row">--}}

{{--                            <input type="hidden" name="periorety" value="false">--}}
{{--                             <input type="checkbox" name="periorety" style="height: 25px;width: 25px;" class="d-inline-block"  {{ ($website->periorety=="1")? "checked":""}} value="true">--}}


{{--                         </div>--}}
{{--                     </div>--}}
                 </div>
                 <div class="col-12 col-lg-4 px-0">

                     <div class="col-12 mb-3">
                         <div class="col-12 cairo">
                             تفاصيل الموقع
                         </div>
                         <div class="col-12 mt-2 row">
                             <textarea class="form-control" style="height: 250px" name="description">{{$website->description}}</textarea>
                         </div>
                     </div>


                     <div class="col-12 mb-3">
                         <div class="col-12 cairo">

                         </div>
                         <div class="col-12 mt-2 row">
                             <button class="btn btn-info py-2 px-4 col-12 text-center">تحديث بيانات الموقع</button>
                         </div>
                     </div>


                </div>
            </div>
            </form>
        </div>
    </div>

</div>




@endsection
