<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function get_websites_api(){
      $n_o_sites=\App\Setting::get()->first();
      $count=\App\Website::where('visible',true)->get()->count();
      if($count<=$n_o_sites['number_of_sites'])
      {
        $temp=\App\Website::where('visible',true)->get()->random($count)->toArray();
        shuffle($temp);
        return  json_encode($temp);
      }
      else{
      $temp= \App\Website::where('visible',true)->get()->random($n_o_sites['number_of_sites'])->toArray();
       shuffle($temp);
        return  json_encode($temp);

      }
    }
    public function get_site_settings_api(){
      return \App\Setting::get();
    }

    public function update_user_password(Request $request){
      $request->validate([
        'email'=>'email|required',
        'new_password'=>'string|min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation'=>'string|min:6',

      ]);
      $user=\App\User::where('email',$request->email)->get()->first();
      if(null!==$user){
        $user->update(['password'=>\Hash::make($request->new_password)]);
        return redirect()->back()->with('data',['alert'=>'تم تغيير كلمة المرور بنجاح','alert-type'=>'success']);
      }else{
        return redirect()->back()->with('data',['alert'=>'يبدو انك قمت بإدخال شئ خطا سواء هنا او هناك .. قم بالتدقيق مرة اخري :!','alert-type'=>'error']);
      }
    }
    public function dashboard(Request $request){
        //return \App\Setting::get()->first();
        if($this->first_use()){
            return redirect()->back()->with('data',['alert'=>'إعدادات الموقع للمرة الاولي :)','alert-type'=>'success']);
        }
        else {
            $settings=\App\Setting::get()->first();
            return view('dashboard.index',compact('settings'));
        }
    }
    public function website_create(Request $request){
        return view('dashboard.websites.create');
    }
    public function first_use(){
        $site=\App\Setting::get()->first();
        if(null===$site){
            \App\Setting::create([
                'title'=>'شركة DevLab تهدف إلى بناء وتأسيس وإطلاق مواقع خدمية مصغرة تقدم أفضل الخدمات إلى الزوار العرب ... خدمات عربية برؤية عالمية',
                'style'=>'square',
                'number_of_sites'=>10,
                'fixing'=>false
            ]);
            return 1;
        }else{
            return 0;
        }

    }


    public function store(Request $request){
        $request->validate([
//            'visible'=>'required|string|min:1',
            'title'=>'required|string|min:1',
            'logo_path'=>'required|mimetypes:text/plain,image/png,image/jpeg',
            'icon_path'=>'required|mimetypes:text/plain,image/png,image/jpeg',
            'link'=>'url|required',
//            'periorety'=>'string|required',
            'description'=>'string|nullable'

        ]);





        $website  = new \App\Site ;
        $website->name = $request->title;
        $website->link = $request->link;
        $website->user_id =1;

//        $website  = new \App\Website ;
//        $website->visible = ($request->visible=="true") ? true:false ;
//        $website->title = $request->title;
//        $website->link = $request->link;
//        $website->periorety =($request->periorety=="true") ? true:false ;
//        $website->description = $request->description;


        $logo_path = "";
        $icon_path = "";

        if($request->hasFile('logo_path')){
          $logo_path = $request->file('logo_path');
          $filename = time() . '.' . $logo_path->getClientOriginalExtension();
          \Image::make($logo_path)->resize(300, 300)->save( public_path().'/uploads/' . $filename );
          $logo_path = env('APP_URL').env('PUBLIC_PATH').'/uploads/'.$filename;
         /* $website->save();*/
        };

        if($request->hasFile('icon_path')){
          $icon_path = $request->file('icon_path');
          $filename = time() . '.' . $icon_path->getClientOriginalExtension();
          \Image::make($icon_path)->resize(300, 300)->save( public_path().'/uploads/' . $filename  );
            $icon_path = env('APP_URL').env('PUBLIC_PATH').'/uploads/'.$filename;
          /*$website->save();*/
        };


      $website->save();

        $site_profile=\App\Site_profile::create([
            'user_id'=>\Auth::user()->id,
            'site_id'=>$website->id,
            'logo_ar_path'=> $logo_path,
            'logo_en_path'=> $logo_path,
            'logo_ar_path_dark'=> $logo_path,
            'logo_en_path_dark'=> $logo_path,
            'icon_ar'=> $icon_path,
            'icon_en'=> $icon_path,
        ]);
        $footer=\App\Footer::create(['user_id'=>\Auth::user()->id,'site_id'=>$website->id]);
        $page=\App\Site_page::create(['user_id'=>\Auth::user()->id,'site_id'=>$website->id,'page_name'=>'الصفحة الرئيسية']);
        $Page_text=\App\Page_text::create(['user_id'=>\Auth::user()->id,'site_id'=>$website->id,'page_id'=>$page->id,'content_ar'=>'عنوان تجريبي','content_en'=>'Testing Title']);

      return redirect()->route('dashboard')->with('data',['alert'=>'تم إنشاء الموقع بنجاح :)','alert-type'=>'success']);


        //return $website;
    }

    public function remove_website(Request $request){
        $website=\App\Site::where('id',$request->id)->get()->first();
        if (file_exists(public_path().'/uploads/'.$website['logo_path']) ) {
           unlink(public_path().'/uploads/'.$website['logo_path']);
        }
        if (file_exists(public_path().'/uploads/'.$website['icon_path'])) {
           unlink(public_path().'/uploads/'.$website['icon_path']);
        }
        $website->delete();
        return redirect()->route('dashboard')->with('data',['alert'=>'تم حذف الموقع بنجاح','alert-type'=>'success']);
    }



    public function update(Request $request){
      $request->validate([
//            'visible'=>'required|string|min:1',
            'title'=>'required|string|min:1',
            'logo_path'=>'nullable|sometimes|image',
            'icon_path'=>'nullable|sometimes|image',
            'link'=>'url|required',
//            'periorety'=>'string|required',
            'description'=>'string|nullable'

        ]);





        $website  =  \App\Site::find($request->id) ;
        $website->name = $request->title;
        $website->link = $request->link;
//        $website  =  \App\Website::find($request->id) ;
//        $website->visible = ($request->visible=="true") ? true:false ;
//        $website->title = $request->title;
//        $website->link = $request->link;
//        $website->periorety =($request->periorety=="true") ? true:false ;
//        $website->description = $request->description;


        $logo_path = "";
        $icon_path = "";

        if($request->hasFile('logo_path')){
          $logo_path = $request->file('logo_path');
          $filename = time() . '.' . $logo_path->getClientOriginalExtension();
          \Image::make($logo_path)->resize(300, 300)->save( public_path().'/uploads/' . $filename );
            $logo_path = env('APP_URL').env('PUBLIC_PATH').'/uploads/'.$filename;
            \App\Site_profile::where('site_id',$request->id)->update([
                'logo_ar_path'=> $logo_path,
                'logo_en_path'=> $logo_path,
                'logo_ar_path_dark'=> $logo_path,
                'logo_en_path_dark'=> $logo_path,
            ]);
         /* $website->save();*/
        };

        if($request->hasFile('icon_path')){
          $icon_path = $request->file('icon_path');
          $filename = time() . '.' . $icon_path->getClientOriginalExtension();
          \Image::make($icon_path)->resize(300, 300)->save( public_path().'/uploads/' . $filename  );
            $icon_path = env('APP_URL').env('PUBLIC_PATH').'/uploads/'.$filename;
          /*$website->save();*/
            \App\Site_profile::where('site_id',$request->id)->update([
                'icon_ar'=> $icon_path,
                'icon_en'=> $icon_path,
            ]);
        };


      $website->save();


      return redirect()->route('dashboard')->with('data',['alert'=>'تم تعديل الموقع بنجاح :)','alert-type'=>'success']);

    }

    public function update_settings(Request $request){
        //return $request;
        $request->validate([
            'title'=>'required|string|min:10|max:1000',
            'style'=>'required|string|min:1',
            'number_of_sites'=>'integer|required|min:1',
            'fixing'=>'string|required',
        ]);
        \App\Setting::query()->update([
             'title'=>$request->title,
            'style'=>$request->style,
            'number_of_sites'=>$request->number_of_sites,
            'fixing'=>($request->fixing=="true")?true:false

        ]);
        return redirect()->back()->with('data',['alert'=>'تم تعديل اعدادات الموقع بنجاح :)','alert-type'=>'success']);
    }
    public function edit(Request $request,$id){
      $website=\App\Site::where('id',$id)->get()->first();
      if(null!==$website)
      return view('dashboard.websites.edit',compact('website'));
      return redirect()->back()->with('data',['alert'=>'عفوا لم يتم العثور علي الموقع :)','alert-type'=>'error']);
    }


}
