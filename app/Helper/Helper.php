<?php

use App\Models\ProductColor;
use App\Models\ProductSize;

if (!function_exists('showPrice')) {
    function showPrice($price, $discount = null): string
    {
        if ($discount) {
            return number_format($price - ($price * $discount) / 1000);
        }
        return number_format($price);
    }
}

if (!function_exists('getColor')) {
    function getColor($id)
    {
        return ProductColor::find($id);
    }
}

if (!function_exists('getSize')) {
    function getSize($id)
    {
        return ProductSize::find($id);
    }
}

