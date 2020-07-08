<?php

function presentPrice($price){

        setlocale(LC_MONETARY, 'en_US');
        return money_format('$%i', $price / 100);
    }






?>