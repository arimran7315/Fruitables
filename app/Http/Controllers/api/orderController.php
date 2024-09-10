<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $idAu = ;
        // $count = order::where('user_id','=',Auth::user()->id)->where('status', '=', 0)->get()->count();
        // return $count;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'product_id' => 'required',
                'quantity' => 'required',
            ]
        );
        if ($order->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $order->errors()->all()
            ], 401);
        }
        $check = order::where('product_id', '=', $request->product_id)->where('user_id', '=', $request->user_id)->whereStatus(0)->get();
        if ($check->isEmpty()) {
            $product = Product::whereId($request->product_id)->select('price')->get();

            $order = order::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'total' => $request->quantity * $product[0]->price,
                'status' => 0
            ]);
            if ($order) {
                $product = Product::find($request->product_id);
                $product->quantity -= abs($request->quantity);
                if ($product->quantity <= 10) {
                    $product->status = 1;
                }
                $product->save();
            }
            return response()->json([
                'status' => true,
                'message' => 'Order Added Successfully',
                'user' => $order,
            ], 200);
        } else {

            return response()->json([
                'status' => false,
                'message' => 'Order Already Added',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // return $orders;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "done";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::destroy($request->id);
       if($order){
        $product = Product::find($request->proid);
        $product->quantity += $request->quantity;
        $product->save();
       }
        return "Done";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
