<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $connection = 'third_db'; 
    use HasFactory;
    protected $attributes = [
        'extension_name' => ' sd',
      
    ];
    protected $fillable = [
        'Bdate','harvest','planting','sowing','amountCover','bankAccount','status','wife','other',
        'north', 'east','south', 'west','benificiary', 'bankname','tenurial', 
        'pwd','fourps','gID','idType','idNum','indigenous','if_yes','cooperative','if_yes1','notify','emergency',
        'doc_num','ownername','ownername1','ownername2',
        'surname',
        'first_name',
        'middle_name',
        'extension_name',
        'farm_type',
        'sex',
        'purok',
        'street',
        'barangay',
        'phone',
        'landline',
        'ancestral',
        'agrarian',
        'organic',
        'owner_type',
        'address',
        'crop_type',
        'land_area',
        'latitude',
        'longitude',
    ];
}
