<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer', 'sort_order', 'active'];

    public function scopeActive($query)
    {   
        return $query->where('active', 1);
    }
}
