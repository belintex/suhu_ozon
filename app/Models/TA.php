<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TA extends Model
{
    protected $fillable = ['id','suhu_object', 'suhu_lingkungan', 'konsentrasi_ozon', 'created_at'];
}
