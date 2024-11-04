<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class LinenSize extends Model
{
    protected $fillable = ['parent_category_id', 'white_linen1', 'white_linen2', 'white_cotton', 'colour_linen', 'white_visa_damask', 'ambassador_linen', 'linen_size'];
}
