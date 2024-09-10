<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class trackOrderController extends Controller
{
    public function trackorder(Request $request){
        $status = Order::where('order_id', $request->id)->value('status');
        if($status == 1){
            return redirect()->back()->with([
                'type' => 'warning',
                'message' => '<strong>Not Confirm</strong> Your order has not been Confirmed Yet.'
            ]);
        }else if($status == 2){
            return redirect()->back()->with([
                'type' => 'info',
                'message' => '<strong>Confirmed</strong> Your order has been Confirmed and in a Queue.'
            ]);
        }else if($status == 3){
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => '<strong>Cancled</strong> Your order has been Cancled.'
            ]);
        }else if($status == 4){
            return redirect()->back()->with([
                'type' => 'success',
                'message' => '<strong>Completed</strong> Your order has been Completed.'
            ]);
        }
    }
}
