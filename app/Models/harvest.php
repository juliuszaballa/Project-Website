<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $connection = 'second_db';

    use HasFactory;
    protected $fillable = ['quantity', 'harvest_date','planted','user_id'];
}

