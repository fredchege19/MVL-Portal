<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'pettyId', 'fileName', 'amount', 'user_id'
    ];
}
