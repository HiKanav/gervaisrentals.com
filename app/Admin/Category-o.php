<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'parent_category_id', 'name', 'route_name', 'description', 'thumbnail_location', 'show_one_image', 'sort_order', 'active', 'title', 'meta_title', 'meta_description'];

	protected $casts = [
		'active'         => 'boolean',
		'show_one_image' => 'boolean',
    ];

    /**
     * Products belonging to a particular category
     */
    public function products()
    {
    	return $this->hasMany('App\Admin\Product', 'parent_category_id', 'id')->whereActive(1);
    }

    public function scopeParents($query)
    {   
        return $query->where('parent_category_id', 0)->whereNotIn('id', [0])->whereActive(1)->orWhere('route_name', 'flooring.htm');
    }
    public function scopeChildren($query)
    {   
        return $query->whereNotIn('parent_category_id', [0])->whereActive(1);
    }

    public function childs()
    {
        return $this->hasMany('\App\Admin\Category', 'parent_category_id', 'id')->whereActive(1);
    }
}
