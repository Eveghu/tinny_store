<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sells extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',  // Cambia 'category_name' por 'category_id'
        'amount',
        'date',
        
    ];
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
