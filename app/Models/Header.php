<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo', 'menu_name', 'menu_link', 'button_name', 'button_link'
    ];
}
