<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ExtraCharge extends Model
{
    protected $fillable = ['slug', 'name', 'price', 'id'];
}
