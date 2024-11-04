<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'event_type',
        'event_at',
        'event_start',
        'event_end',
        'venue_name',
        'delivery_postal_code',
        'message',
        'request_type',
        'has_products',
        'no_of_guests',
        'last_name',
        'major_intersections',
        'city',
        'tent_size',
        'delivery_on_elevator',
        'loading_dock_instructions',
    ];

    protected $casts = [
        'has_products' => 'boolean',
    ];

    /**
     * Products of a particular quote
     * @return Collection
     */
    public function products()
    {
    	return $this->hasMany('App\Admin\QuoteProduct');
    }

    /**
     * Total of a particular quote
     * @return Collection
     */
    public function totalPrice()
    {
    	$total = 0;
    	foreach ($this->products as $id => $product) $total += ($product->productDetail->price) * $product->quantity;

        $extraChargeTotal = 0;
        foreach(ExtraCharge::all() as $extraCharge) {
            $extraChargePrice = $extraCharge->is_percent ? ($extraCharge->price*$price)/100 : $extraCharge->price;
            $extraChargeTotal += $extraChargePrice;
        }
        
        $total += $extraChargeTotal;
    	return $total;
    }
}
