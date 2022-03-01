<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $fillable = ['user_id', 'title', 'body', 'picture_path'];
    // attributes we want to hide when passing the model out to frontend
    protected $hidden = [];
}
