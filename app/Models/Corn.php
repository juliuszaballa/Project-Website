<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corn extends Model
{
    use HasFactory;
    protected $connection = 'second_db';
    protected $fillable = ['cornharvest_date', 'cornquantity', 'cornplanted'];
}
