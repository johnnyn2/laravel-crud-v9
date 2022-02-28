<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'tag', 'target', 'brand_id'];
    protected $timestamp = true;
    protected $hidden = [];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
