<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturers';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'name'];
    protected $timestamp = true;
}
