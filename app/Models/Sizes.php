<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'type_id',
        // Cambia 'category_name' por 'category_id'
        'size_name',
      
    ];

}
