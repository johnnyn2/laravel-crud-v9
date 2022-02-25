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

    public function products() {
        return $this->hasMany(Product::class);
    }
}
