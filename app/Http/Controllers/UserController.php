<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'customer') {
            } else {
                $retailers = User::whereStatus(0)->whereRole('retailer')->get();

                $products = Product::where('quantity', '<', '10')->get();

                $completeOrders = order::where('status', 4)->groupBy('order_id')->count();

                $totalSale = Order::where('status', 4)
                    ->select(DB::raw('ROUND(SUM(total), 2) as total_quantity'))
                    ->first()->total_quantity;

                $orders = Order::with('user', 'product')  // Load related User and Product models
                ->select('orders.order_id', 'users.name', 'users.email', 'users.contact', DB::raw('SUM(products.price * orders.quantity) as price'))
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->where('orders.status', 1)
                ->groupBy('orders.order_id', 'users.name', 'users.email', 'users.contact')
                ->get();
                return view('admin.index', compact('retailers', 'products', 'completeOrders', 'totalSale','orders'));
            }
        } else {
            return redirect()->route('home');
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Field is required',
            'password.required' => 'Field is required'
        ]);
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == "admin") {

                return redirect()->route('admin.index');
            } else if (Auth::user()->role == "retailer") {

                if (Auth::user()->status == 0) {

                    return redirect()->back()->with([
                        'type' => 'danger',
                        'message' => 'Admin is not approved your account yet'
                    ]);
                } else {
                    return redirect()->route('admin.index');
                }
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Invalid credentials'
            ]);
        }
    }
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ], [
            'name.required' => 'Field is required',
            'email.required' => 'Field is required',
            'email.unique' => 'Email is already Registered',
            'password.required' => 'Field is required',
            'password.confirmed' => 'Password is not matched'
        ]);

        if ($request->role == 'retailer') {
            User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => $request->password,
                'status' => 0,
                'role' => $request->role
            ]);
            return redirect()->route('admin.login')->with([
                'type' => 'success',
                'message' => 'Accounct Created Successfully Admin Wait for admin approval'
            ]);
        } else {
            User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => $request->password,
                'status' => 1,
                'role' => 'customer'
            ]);
            return redirect()->route('loginPage')->with([
                'type' => 'success',
                'message' => 'Account was successfully registered'
            ]);
        }
    }
    public function logout()
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'retailer') {
            Auth::logout();
            return redirect()->route('admin.login');
        } else {
            Auth::logout();
            return redirect()->route('home');
        }
    }
    public function clientSide()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function updateInformation(Request $request)
    {
        User::whereId(Auth::user()->id)->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address
        ]);
        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Information updated successfully'
        ]);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ], [
            'password.required' => 'Field is required',
            'password.confirmed' => 'Password is not matched',
        ]);
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Password updated successfully'
        ]);
    }
    public function updateImage(Request $request)
    {
        $request->validate([
            'profile' => 'required',
        ], [
            'profile.required' => 'Field is required',
        ]);
        $image_path = public_path("/storage/") . $request->profile;
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        $path = $request->file('profile')->store('users', 'public');
        User::whereId(Auth::user()->id)->update([
            'image' => $path
        ]);
        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Update Image Successfully'
        ]);
    }
}
