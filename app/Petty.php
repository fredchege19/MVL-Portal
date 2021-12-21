<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petty extends Model
{
    protected $table = "pettys";

    protected $fillable = [
        'item', 'project', 'department','narration', 'amount','receipts', 'status', 'user_id', 'payee', 'edited', 
        'editedReason', 'rejectReason', 'accounted_date', 'payeePhone', 'approval1', 'approval2', 'approval3'
    ];
}
