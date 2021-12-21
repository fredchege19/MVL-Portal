<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id','supervisor','technician','activity_type','region','county','road','site','start_date','end_date',
        'remarks','status','reason_status'
    ];
}
