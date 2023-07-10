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

use Validator, Hash, DB;

class CartController extends Controller
{
    function show(Request $request){

        $products = Products::where('id', $request->id)->get();

        foreach ($products as $product) {
            $product->additionalData = Products_details::where('id_product', '=', $product->id)->get();
            $product->categorieData = Categories::where('id', '=', $product->id_categories)->get();
            $product->statusData = Status::where('id', '=', $product->id_status)->get();
        }

        $product->quantity = $request->quantity;
        $product->shippingMethod = Shipping_zone_methods::all();
        

        return view('store.cart', compact('products'));

    }

}
