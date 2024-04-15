<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
    use HasFactory, softDeletes;
    protected $table = "posts";
    protected $fillable = [
        'title',
        'image',
        'user_id',
        'category_id',
        'description'
    ];
}
