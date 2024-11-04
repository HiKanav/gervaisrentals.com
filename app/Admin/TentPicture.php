<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TentPicture extends Model
{
	protected $fillable = ['category_id', 'name', 'description', 'thumbnail_location', 'main_location', 'active'];

	protected $casts = [
		'active'         => 'boolean'
    ];

    /**
     * Tent Category
     */
    public function category()
    {
    	return $this->belongsTo('App\Admin\TentPictureCategory', 'category_id', 'id');
    }

    public function scopeActive($query)
    {   
        return $query->whereActive(1);
    }
}
