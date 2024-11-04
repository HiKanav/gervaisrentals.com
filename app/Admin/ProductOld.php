<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductOld extends Model
{
	protected $fillable = ['parent_category_id', 'code', 'name', 'description', 'price', 'sort_order', 'active', 'thumbnail_location_1', 'thumbnail_location_2', 'thumbnail_location_3', 'image_location_1', 'image_location_2', 'image_location_3'];

	protected $casts = [
		'active'         => 'boolean'
    ];
    
	/**
	 * Parent Category
	 */
    public function category(){
    	return $this->belongsTo('App\Admin\Category', 'parent_category_id', 'id');
    }
}
