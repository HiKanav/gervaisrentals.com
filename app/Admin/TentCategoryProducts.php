<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TentCategoryProducts extends Model
{
	protected $fillable = ['tent_category_id', 'size', 'seating', 'pole_drapes', 'asphalt_charges', 'price_installed', 'thumbnail_location', 'main_location', 'sort_order'];

	public function tentCategory()
	{
		return $this->belongsTo('App\Admin\TentCategory', 'tent_category_id', 'id');
	}
}
