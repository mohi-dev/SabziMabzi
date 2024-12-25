<?php

namespace App\Models;

use App\Traits\TimeStamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, TimeStamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const CREATED_AT = 'time_created';
    const UPDATED_AT = 'time_updated';

    protected $fillable = [
        'price',
        'title',
        'description',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id');
    }
}
