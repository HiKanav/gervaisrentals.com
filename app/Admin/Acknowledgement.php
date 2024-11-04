<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Acknowledgement extends Model
{
    protected $fillable = ['description', 'thumbnail_location', 'file_location', 'sort_order', 'active'];

    public function scopeActive($query)
    {   
        return $query->where('active', 1);
    }
}
