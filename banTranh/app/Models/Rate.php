<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'rates';

    protected $fillable = [
        'product_id',
        'order_id',
        'email',
        'stars',
        'comment',
        'image',
        'rated_at',
        
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}