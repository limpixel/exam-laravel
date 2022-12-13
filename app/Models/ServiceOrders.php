<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_item_id',
        'ip',
        'order_number',
        'status',
        'device',
    ];
}
