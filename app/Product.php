<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function presentPrice()
    {
        setlocale(LC_MONETARY, 'en_US');
        return money_format('$%i', $this->price / 100);
    }

    // function asDollars($value) {
    //     if ($value<0) return "-".asDollars(-$value);
    //     return '$' . number_format($value, 2);
    //   }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
        
    }
}
