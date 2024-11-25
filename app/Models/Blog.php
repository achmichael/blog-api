<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'description', 'image'];
    // protected $table = 'blogs';
    // protected $primaryKey = 'id';
    // protected $autoIncrement = true;
    protected $casts = [
        'image' => 'array'
    ];


}
