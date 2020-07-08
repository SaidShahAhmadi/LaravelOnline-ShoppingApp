<?php

function asDollars($value) {
    if ($value<0) return "-".asDollars(-$value);
    return '$' . number_format(floatval($value), 0);
  }

function presentPrice($price)
{
    // setlocale(LC_MONETARY, 'en_US');
    // return money_format('$%i', $price / 100);


}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}


function productImage($path){
        // when the image is not showing 
        //                     if file turn  so-the-default-image-will-be-show  if-not-not-found.jpg-image-show    
        return ($path != null) && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}