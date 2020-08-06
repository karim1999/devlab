<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $connection = 'mysql2';
    public $guarded=[];
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function footer(){
    	return $this->hasMany('App\Footer');
    }
    public function site_page(){
    	return $this->hasMany('App\Site_page');
    }
    public function site_profile(){
    	return $this->hasMany('App\Site_profile');
    }
//    public function statistic(){
//    	return $this->hasMany('App\Statistic');
//    }

    public function getTitleAttribute()
    {
        return $this->name;
    }
    public function getLogoPathAttribute()
    {
        return $this->site_profile[0]->icon_en;
    }
    public function getIconPathAttribute()
    {
        return $this->site_profile[0]->logo_en_path;
    }


}
