<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesItems extends Model
{
    use HasFactory;

    protected $table = 'service_items';

    protected $fillable = [
        'service_category_id',
        'image',
        'slug',
        'description',
        'image',
        'price',
        'total_days'
    ];
}
