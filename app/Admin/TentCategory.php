<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TentCategory extends Model
{
	protected $table = 'tent_categories';
    protected $fillable = ['name', 'sort_order', 'active'];

    protected $casts = [
		'active'         => 'boolean'
    ];

    
    public function scopeActive($query)
    {   
        return $query->whereActive(1);
    }

    public function products()
	{
		return $this->hasMany('App\Admin\TentCategoryProducts', 'tent_category_id', 'id');
	}
}
