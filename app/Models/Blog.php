<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

        protected $fillable = [
        'blog_title',
        'blog_cat',
        'blog_description',
        'blog_location',
        'blog_thumbnail',
        'blog_favimg',
        'blog_favimg1',
        'blog_favimg2',
        'blog_favimg3',
        'blog_content',
    ];

}
