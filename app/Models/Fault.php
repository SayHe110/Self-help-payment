<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    protected $fillable = ['title', 'description', 'dormitory', 'phone', 'arrival_processing', 'processing_person'];
}
