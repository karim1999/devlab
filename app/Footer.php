<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $connection = 'mysql2';

    public $guarded=[];
    public function user(){
    	return $this->belongsTo('App\User');

    }
    public function site(){
    	return $this->belongsTo('App\Site');
    }
}
