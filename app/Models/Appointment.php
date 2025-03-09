<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';

    protected $fillable = ['name', 'email', 'phone_number', 'service_type', 'location', 'warranty', 'message'];
}
 