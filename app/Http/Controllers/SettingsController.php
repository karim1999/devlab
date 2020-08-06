<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function terms(){
        $setting = \App\Setting2::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => "", 'terms_en' => "", 'privacy_en' => ""]
        );
        return view('common', ["data"=> $setting->terms, "title" => "الشروط والاحكام"]);
    }
    public function policy(){
        $setting = \App\Setting2::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => "", 'terms_en' => "", 'privacy_en' => ""]
        );
        return view('common', ["data"=> $setting->privacy, "title" => "سياسة الخصوصية"]);
    }
    public function terms_en(){
        $setting = \App\Setting2::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => "", 'terms_en' => "", 'privacy_en' => ""]
        );
        return view('common', ["data"=> $setting->terms_en, "title" => "Terms and Conditions", "english"=> true]);
    }
    public function policy_en(){
        $setting = \App\Setting2::firstOrCreate(
            ['id' => 1],
            ['terms' => "", 'privacy' => "", 'terms_en' => "", 'privacy_en' => ""]
        );
        return view('common', ["data"=> $setting->privacy_en, "title" => "Policy", "english"=> true]);
    }
}
