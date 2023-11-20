<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function type()
    {
        return $this->belongsTo(Types::class, 'type_id');
    }
}
