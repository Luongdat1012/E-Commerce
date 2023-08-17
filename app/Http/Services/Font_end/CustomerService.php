<?php

namespace App\Http\Services\Font_end;

use App\Models\OrderDetails;
use App\Models\Review;
use Livewire\Component;

class CustomerService extends Component
{

    public function reviewStore($request, $orderDetailId)
    {
        try {
            $productId = OrderDetails::find($orderDetailId)->productDetail->product_id;
            Review::create([
                'rating' => $request->rating,
                'comment' => $request->review,
                'order_detail_id' => $orderDetailId,
                'product_id' => $productId
            ]);
            OrderDetails::where('id', $orderDetailId)->update([
                'rstatus' => 1
            ]);
        } catch (\Exception $e) {
            return $e;
        }
    }

}
