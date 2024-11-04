<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'parent_category_id', 'name', 'route_name', 'description', 'quantity_minimum', 'quantity_maximum', 'quantity_interval', 'thumbnail_location', 'show_one_image', 'sort_order', 'active', 'title', 'meta_title', 'meta_description'];

	protected $casts = [
		'active'         => 'boolean',
		'show_one_image' => 'boolean',
    ];

    protected $appends = ['thumbnail_url'];

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

    public function parent()
    {
        return $this->belongsTo('\App\Admin\Category', 'parent_category_id', 'id');
    }

    public function getThumbnailUrlAttribute()
    {
        $thumbnails = $this->thumbnail_location;
        return $thumbnails ? asset(env('CATEGORY_LOCATION', 'imgs/category') . '/' .$thumbnails) : asset('default/front/imgs/footer-logo.png');
    }
}
