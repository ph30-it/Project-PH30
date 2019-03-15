<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'quantity', 'image'
    ];

    public function images()
    {
    	return $this->hasMany('App\Image');
    }
}
