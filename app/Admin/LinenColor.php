<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class LinenColor extends Model
{
    protected $fillable = ['name', 'thumbnail_location', 'main_location'];
}
