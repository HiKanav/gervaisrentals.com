<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['thumbnail_location', 'main_location', 'sort_order', 'active'];

    public function scopeActive($query)
    {   
        return $query->where('active', 1);
    }
}
