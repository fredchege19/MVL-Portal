<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'businessPartner', 'subject', 'user_id', 'priority', 'description', 'problemType', 'technician', 'resolution', 'status'
    ]; 
}
