<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Products extends Model
{
    use HasFactory;
    use Searchable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',
        'type_id',
        // Cambia 'category_name' por 'category_id'
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
    public function type()
    {
        return $this->belongsTo(Types::class, 'type_id');
    }
}

