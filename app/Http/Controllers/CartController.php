<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Products;
use App\Models\Products_details;
use App\Models\Categories;
use App\Models\Status;
use App\Models\Shipping_zone_methods;

use Illuminate\Support\Facades\Session;

use Validator, Hash, DB;

class CartController extends Controller
{
    function show(Request $request){
        Session::put('Shipping_zone_methods',  Shipping_zone_methods::all());
        return view('store.cart');
    }

}
