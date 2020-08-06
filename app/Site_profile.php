<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_profile extends Model
{
    protected $connection = 'mysql2';
    public $guarded=[];

    protected $hidden = [
        'view_id', 'credentials_statistics',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function site(){
    	return $this->belongsTo('App\Site');
    }
}
