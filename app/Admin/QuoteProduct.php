<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class QuoteProduct extends Model
{
	protected $fillable = ['quote_id', 'product_id', 'quantity'];
	
    /**
     * Quote Detail
     * @return Collection
     */
    public function quote()
    {
    	return $this->belongsTo('App\Admin\Quote');
    }

    /**
     * Details of product quoted
     * @return Collection
     */
    public function productDetail()
    {
        return $this->belongsTo('App\Admin\Product', 'product_id', 'id');
    }
}
