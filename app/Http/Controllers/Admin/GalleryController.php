<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use App\Models\ProductSize;

class GalleryController extends Controller
{
    public function ajaxSelectColors()
    {
        $color = ProductColor::all();
        $str = '<div class="row py-1 mx-0">' .
            '<select class="custom-select col-md-9 mx-2 select-color" onfocus="checkSelect(1)" name="category">' .
            ' <option value="0">--- Chọn màu sản phẩm ---</option>';
        foreach ($color as $value)
        $str .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        $str .='</select>' .
            '<a href="javascript:void(0);" class="remove_button px-4">' .
            '<span class="btn btn-danger waves-effect width-xs waves-light">' .
            '<i class="mdi mdi-trash-can"></i>' .
            '</span>' .
            '</a>' .
            '</div>';

        return $str;
    }


    public function ajaxSelectSizes()
    {

        $size = ProductSize::all();
        $str = '<div class="row py-1 mx-0">' .
            '<select class="custom-select col-md-9 mx-2 select-size" onfocus="checkSelect(2)" name="category">' .
            ' <option value="0">--- Chọn màu sản phẩm ---</option>';
        foreach ($size as $value)
            $str .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        $str .='</select>' .
            '<a href="javascript:void(0);" class="remove_button px-4">' .
            '<span class="btn btn-danger waves-effect width-xs waves-light">' .
            '<i class="mdi mdi-trash-can"></i>' .
            '</span>' .
            '</a>' .
            '</div>';

        return $str;
    }


}
