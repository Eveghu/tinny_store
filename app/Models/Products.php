<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',  // Cambia 'category_name' por 'category_id'
        'product_name',
        'description',
        'color',
        'size',
        'assor_quant',
        'sold_quant',
        'total_quant',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function sizeIsSelected($sizeToCheck) {
        return $this->size == $sizeToCheck;
    }

}
