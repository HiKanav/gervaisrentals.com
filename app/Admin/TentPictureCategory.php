<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TentPictureCategory extends Model
{
    protected $table = 'tent_picture_categories';

    protected $fillable = ['name', 'active'];

    protected $casts = [
		'active'         => 'boolean'
    ];

    /**
     * Pictures of a tent category
     */
    public function pictures()
    {
    	return $this->hasMany('App\Admin\TentPicture', 'category_id', 'id')->whereActive(1);
    }

    public function scopeActive($query)
    {   
        return $query->whereActive(1);
    }
}
