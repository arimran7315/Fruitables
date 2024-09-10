<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retailers = User::whereRole('retailer')->get();
        return view('admin.manageRetailer', compact('retailers'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $retailer = User::find($id);
        return view('admin.editRetailer', compact('retailer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->edit_retailer){
            User::whereId($id)->update([
                'name' => $request->name,
                'contact' => $request->contact,
                'address' => $request->address,
            ]);
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Update Retailer Successfully'
            ]);
        }else{
        
            User::whereId($id)->update([
                'status' => $request->status,
            ]);
        return redirect()->back()->with([
            'type' => 'success',
            'message' => 'Retailer Approved Successfully'
        ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with([
            'type' => 'danger',
            'message' => 'Retailer deleted successfully'
        ]);
    }
}
