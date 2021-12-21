<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    protected $fillable = [
        'department', 'user_id', 'amount', 'activity_id', 'reason', 'item', 'rejectReason', 'approval1', 'approval2',
        'approval3'
    ];
}
