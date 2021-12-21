<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{
    protected $table = "actitity_images";
    protected $fillable = [
        'activity_id', 'user_id', 'file', 'status'
    ];
}
