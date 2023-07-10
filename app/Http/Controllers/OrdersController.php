<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use App\Models\Products;

use Validator, Hash, DB;

class OrdersController extends Controller
{
    function guardarPreOrders(Request $request){

        $product = Products::where('id', $request->id)->get();
        $product->subTotal = $product[0]->price * $request->quantity;

        if(empty($product->sale_price)){
            $product->subTotal = $product[0]->sale_price * $request->quantity;
        }else{
            $product->subTotal = $product[0]->price * $request->quantity;
        }

        if (Session::has('cart')) {
            $value = Session::get('cart');
            $value[] = $product;
            Session::put('cart',  $value);
        }else{
            Session::put('cart',  $product);
        }
        
        return redirect()->back()->with('status_success', 'Producto '.$product[0]->name.' agregado al carrito');
    }
}
