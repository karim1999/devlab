<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page_text extends Model
{
    protected $connection = 'mysql2';

    public $guarded=[];
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function site(){
    	return $this->belongsTo('App\Site');
    }
    public function page(){
    	return $this->belongsTo('App\Site_page');
    }
}
