<?php

namespace App\Http\Controllers;

use App\Mail\ordermail;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'customer') {
            $products = Product::select('products.name', 'products.image', 'products.price', 'orders.quantity')
                ->join('orders', 'products.id', '=', 'orders.product_id')
                ->where('orders.status', '=', 4)
                ->where('orders.user_id', Auth::user()->id)
                ->get();
            return view('profile', compact('products'));
        } else {
            $orders = DB::table('orders as o')
                ->join('products as p', 'o.product_id', '=', 'p.id')
                ->join('users as u', 'o.user_id', '=', 'u.id')
                ->select(
                    'o.order_id',
                    DB::raw('MAX(p.name) as proname'),
                    DB::raw('MAX(p.price) as price'),
                    DB::raw('MAX(u.name) as username'),
                    DB::raw('MAX(u.contact) as contact'),
                    DB::raw('MAX(u.id) as user_id'),
                    DB::raw('MAX(o.order_id) as code'),
                    DB::raw('MAX(o.created_at) as created_at')
                )
                ->where('o.status', 4)
                ->groupBy('o.order_id')
                ->get();

            return view('admin.completeOrders', compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::with(['product', 'user'])
            ->where('status', 2)
            ->get();
        return view('admin.confirmedOrders', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders = Product::join('orders as o', 'products.id', '=', 'o.product_id')
            ->select('products.name', 'products.image', 'products.price', 'products.id as pid', 'products.status', 'o.*')
            ->where('o.status', 0)
            ->where('o.user_id', $id)
            ->get();
        return view('cart', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::select('products.name', 'products.image', 'products.price', 'orders.quantity', 'orders.id')
            ->join('orders', 'products.id', '=', 'orders.product_id')
            ->where('orders.status', 0)
            ->where('orders.user_id', $id)
            ->get();

        return view('checkOut', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->role == 'customer') {
            $code = mt_rand(1000, 9999);
            $email = Auth::user()->email;
            foreach ($request->id as $oid) {
                $order = order::whereId($oid)->update([
                    'status' => 1,
                    'order_id' => $code
                ]);
            }
            $orders = Order::with(['user', 'product'])  // Eager load related models
                ->select('orders.quantity', 'orders.order_id', 'users.name', 'users.email', 'products.name as product', 'products.price', 'products.unit')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->where('orders.order_id', $code)
                ->get();  // Retrieve a single order
            $mailData = [
                'code' => $code,
                'subject' => 'Placed Order',
                'orders' => $orders,
                'status' => 'placed'
            ];
            Mail::to($email)->send(new ordermail($mailData));
            return view('placeOrder', compact('code'));
        } else {

            if ($request->status == 'confirm') {
                order::where('order_id', '=', $id)->update([
                    'status' => 2
                ]);
               
                $mailData = ['subject' => 'Order Confirmed', 'status' => 'confirmed', 'code' => $id];
                Mail::to($request->email)->send(new ordermail($mailData));
                return redirect()->back();
            }
            if ($request->status == 'reject') {
                order::where('order_id', '=', $id)->update([
                    'status' => 3
                ]);

                $mailData = ['subject' => 'Order Rejected', 'status' => 'reject', 'code' => $id];
                Mail::to($request->email)->send(new ordermail($mailData));
                return redirect()->back();
            }
            if ($request->status == 'complete') {
                order::where('id', '=', $id)->update([
                    'status' => 4
                ]);
                $mailData = ['subject' => 'Order Completed', 'status' => 'complete', 'code' => $id];
                Mail::to($request->email)->send(new ordermail($mailData));
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
