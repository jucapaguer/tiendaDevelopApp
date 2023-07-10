<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use App\Models\Products;
use App\Models\Shipping_zone_methods;

use Validator, Hash, DB;

class OrdersController extends Controller
{
    function guardarPreOrders(Request $request){
        //Session::forget('itemsCar'); 
        $product = Products::where('id', $request->id)->get();

        if(!is_null($product[0]->sale_price)){
            $product[0]->price = $product[0]->sale_price;
            $product[0]->subTotal = $product[0]->sale_price * $request->quantity;
        }else{
            $product[0]->subTotal = $product[0]->price * $request->quantity;
        }
        $product[0]->quantity = $request->quantity;

        $tempSub = 0;
        $tempQ = 0;
        $newIte = false;

        if (Session::has('itemsCar')) {
            $value = Session::get('itemsCar');
            
            if(count($value) != 0){
                $resultado = $value->filter(function($elemento) use ($request) {
                    return $elemento['id'] == $request->id;
                })->keys();

                if(count($resultado) != 0){
                    $value[$resultado[0]]->quantity += $request->quantity;
                    $value[$resultado[0]]->subTotal = $product[0]->subTotal*$request->quantity;
                }else{
                    $value[] = $product[0];
                }
            }else{
                $value = $product; 
            }
            Session::put('itemsCar',  $value);
        }else{
            Session::put('itemsCar',  $product);
        }
       
        return redirect()->back()->with('status_success', 'Producto '.$product[0]->name.' agregado al carrito');
    }

    function deletItemPreOrder(Request $request){

        $value = Session::get('itemsCar');
        unset($value[$request->id]);
        Session::put('itemsCar',  $value);

        return redirect()->back()->with('status_success', 'Producto eliminado del carrito');
    }
}
