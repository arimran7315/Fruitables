<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        if(Auth::check()){
            if (Auth::user()->role == 'customer') {
                return view('shop', compact('products'));
            } else {
                return view('admin.manageProduct', compact('products'));
            }
        }else{
            return view('shop', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'category' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Field is required',
            'image.required' => 'Field is required',
            'category.required' => 'Field is required',
            'price.required' => 'Field is required',
            'unit.required' => 'Field is required',
            'quantity.required' => 'Field is required',
            'description.required' => 'Field is required'
        ]);
        if ($request->hasFile('image')) {
            $path = $request->image->store('products', 'public');
            Product::create([
                'name' => $request->name,
                'image' => $path,
                'category' => $request->category,
                'price' => $request->price,
                'unit' => $request->unit,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'status' => 1
            ])->save();
            return redirect()->route('product.index')->with([
                'type' => 'success',
                'message' => 'Product Added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        //    if(Auth::user()->role == 'customer'){
        $comments = Comment::where('product_id', 1)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.created_at', 'comments.review', 'users.name')
            ->get();

        return view('viewProduct', compact('product', 'comments'));
        //    }else{
        //     return view('admin.editProduct', compact('product'));
        //    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if (Auth::user()->role == 'customer') {
            return view('viewProduct', compact('product'));
        } else {
            return view('admin.editProduct', compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
        ],[
            'name' => 'Field is required',
            'price' => 'Field is required',
            'description' => 'Field is required',
            'category' => 'Field is required',
            'image' => 'Field is required',
            'quantity' => 'Field is required',
            'unit' => 'Field is required',
        ]);
        $prePost = Product::select('id', 'image')->where('id',$id)->get();
    
        if ($request->image != '') {
            $path = public_path() . '/storage/';

            if ($prePost[0]->image != '' && $prePost[0]->image != null) {
                $old_file = $path . $prePost[0]->image;
                if (file_exists($old_file)) {
                    unlink($old_file);
                }
            }

            $img = $request->image;
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $img->move(public_path() . '/storage/', $imageName);

        }else{
            $imageName = $prePost[0]->image;
        }
        Product::where('id', $id)->update([
            'name' => $request->name,
             'price' => $request->price,
             'description' => $request->description,
             'category' => $request->category,
             'image' => $imageName,
             'quantity' => $request->quantity,
             'unit' => $request->unit,
         ]);
         return redirect()->route('product.index')->with([
             'type' => 'success',
             'message' => 'Product updated successfully'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->back()->with([
            'type' => 'danger',
            'message' => 'Product deleted successfully'
        ]);
    }
}
