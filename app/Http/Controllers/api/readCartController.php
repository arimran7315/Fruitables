<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class readCartController extends Controller
{
    public function readCart(string $id){
        
            $count = order::where('user_id','=',$id)->where('status', '=', 0)->get()->count();
            return $count;
    }
}
