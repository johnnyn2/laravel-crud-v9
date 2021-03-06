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

    // not a good example to use manufacturer table as product should have many-to-1 relationship to manufacturer
    // but it is just a demonstration on how to use hasManyThrough relationship
    // define hasManyThrough relationship for Brand class to get all Manufacturers through Product class 
    public function manufacturers()
    {
        return $this->hasManyThrough(Manufacturer::class, Product::class);
    }

}
