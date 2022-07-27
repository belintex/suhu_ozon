<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Switching extends Model
{
    protected $fillable = ['id', 'relay', 'fan', 'created_at'];
}
