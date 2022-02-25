<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];
    protected $timestamp = true;
    protected $hidden = [];

    // define OneToMany relationship Brand:Product
    public function products() {
        return $this->hasMany(Product::class);
    }

    // define hasManyThrough relationship for Brand class to get all Manufacturers through Product class 
    public function manufacturers()
    {
        return $this->hasManyThrough(Manufacturer::class, Product::class);
    }

}
