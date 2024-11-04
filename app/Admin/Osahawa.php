<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Osahawa extends Model
{
    protected $fillable = ['thumbnail_location', 'main_location', 'active'];

	protected $casts = [
		'active'         => 'boolean'
    ];

    public function scopeActive($query)
    {   
        return $query->whereActive(1);
    }
}