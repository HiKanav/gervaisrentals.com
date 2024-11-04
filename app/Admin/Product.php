<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['parent_category_id', 'code', 'name', 'description', 'price', 'quantity_minimum', 'quantity_maximum', 'quantity_interval', 'sort_order', 'active', 'thumbnail_location_1', 'thumbnail_location_2', 'thumbnail_location_3', 'image_location_1', 'image_location_2', 'image_location_3'];

	protected $casts = [
		'active'         => 'boolean'
    ];

    protected $appends = ['min', 'max', 'step', 'thumbnail_url', 'category_url'];
    
	/**
	 * Parent Category
	 */
    public function category(){
    	return $this->belongsTo('App\Admin\Category', 'parent_category_id', 'id');
    }

    /**
     * Accessor for Minimum Quantity that can be ordered
     * @param  string $v
     * @return int
     */
    public function getMinAttribute()
    {
        return $this->getQuantityAttribute('quantity_minimum') ?: 0;
    }

    /**
     * Accessor for Maximum Quantity that can be ordered
     * @param  string $v
     * @return int
     */
    public function getMaxAttribute()
    {
        return $this->getQuantityAttribute('quantity_maximum');
    }

    /**
     * Accessor for Quantity Interval for a product
     * @param  string $v
     * @return int
     */
    public function getStepAttribute()
    {
        return $this->getQuantityAttribute('quantity_interval');
    }

    /**
     * Helper function for applying different quantity attributes
     * @param string $attr
     */
    private function getQuantityAttribute($attr)
    {
        $values[] = $this->$attr;
        $values[] = $this->category->$attr;
        $values[] = $this->category->parent ? $this->category->parent->$attr : "";
        $values =  array_filter($values);
        return end($values);
    }

    /**
     * Get Url of Thumbnail
     * @param 
     * @return string
     */
    public function getThumbnailUrlAttribute()
    {
        $thumbnails = array_filter([$this->thumbnail_location_1, $this->thumbnail_location_2, $this->thumbnail_location_3]);
        return count($thumbnails) ? asset(env('PRODUCT_LOCATION', 'imgs/product') . '/' .$thumbnails[0]) : asset('default/front/imgs/footer-logo.png');
    }

    /**
     * Get Url of Image
     * @param 
     * @return string
     */
    public function getImageUrlAttribute()
    {
        $image = array_filter([$this->image_location_1, $this->image_location_2, $this->image_location_3]);
        return count($image) ? asset(env('PRODUCT_LOCATION', 'imgs/product') . '/' .$image[0]) : asset('default/front/imgs/footer-logo.png');
    }

    public function getCategoryUrlAttribute()
    {
        return url($this->category->route_name);
    }

    /*public function qtyMultiple()
    {
        // Dishes
        if($this->category->parent->id == 2 || $this->category->id == 2) {
            $qtyMultiple = 5;
        }
        // Glasswares
        else if ($this->category->parent->id == 12 || $this->category->id == 12) {
            $qtyMultiple = 12;
        }
        // Cultery
        else if (in_array($this->category->id, [42, 43, 44, 45, 46])) {
            $qtyMultiple = 5;
        }
        else {
            $qtyMultiple = 1;
        }

        return $qtyMultiple;
    }*/
}
