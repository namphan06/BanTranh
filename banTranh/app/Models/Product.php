<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name',
        'detail',
        'image',
        'price',
        'category_id',
        'size',
        'material',
        'frame',  // Kiểu bool
        'condition',
    ];
}