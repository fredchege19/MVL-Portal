<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    protected $fillable = [
        'name', 'county_id'
    ];
}
