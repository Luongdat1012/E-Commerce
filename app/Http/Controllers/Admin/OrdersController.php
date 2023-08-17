<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        return view('admin.order.Order');
    }

    public function show($id){
        $order = Orders::find($id);
        return view('admin.order.OrdersFormView',compact('order'));
    }
}
