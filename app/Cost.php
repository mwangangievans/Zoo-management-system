<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
      protected $fillable = [
	'foreigner',
    'local',
    'children'
    ];
}
