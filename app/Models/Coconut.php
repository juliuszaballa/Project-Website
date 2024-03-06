<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coconut extends Model
{ protected $connection = 'second_db';
    protected $fillable = ['coconutharvest_date', 'coconutquantity'];
    use HasFactory;
}
