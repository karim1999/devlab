<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting2 extends Model
{
    protected $connection = 'mysql2';
    protected $table= 'settings';
    //
    protected $fillable= [
        "id",
        "terms",
        "privacy",
        "terms_en",
        "privacy_en"
    ];
}
