<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $fillable = [
        'name',
        'date',
        'author',
        'content',
        'image'
    ];
    public $timestamps = false;
}
