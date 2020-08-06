<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   protected $guarded=[];
   protected $fillable=[
						"title",
						"style",
						"number_of_sites",
						"fixing"
					];
}
