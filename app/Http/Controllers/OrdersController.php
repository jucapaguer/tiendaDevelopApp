<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use App\Models\Orders;
use App\Models\Orders_items;
use App\Models\Products;
use App\Models\Shipping_zone_methods;
use App\Models\User;
use App\Models\User_address;

use Validator, Hash, DB;

class OrdersController extends Controller
{
    function guardarPreOrders(Request $request){
        //Session::forget('itemsCar'); 
        $product = Products::where('id', $request->id)->get();


        //var_dump($product[0]->sale_price);

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

    function registerMethod(Request $request){
        Session::put('shipping_zone_method', $request->variable);
    }

    function create(Request $request){

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
            'address' => 'required',
            'department' => 'required',
            'population' => 'required',
        ]);

        if(count(User::where('email', $request->email)->get()) > 0){
            return redirect()->back()->with('status_error', "Este correo se encuentra registrado");
        }

        try {
            if($request->password){
                $pass = $request->password;
            }else{
                $pass = "00000000";
            }

            $user = new User;
            $user->rol = 2;
            $user->id_status = 1;
            $user->name = $request->name;
            $user->last_name = $request->lastname;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($pass);
            $user->save();

            $user_address = new User_address;
            $user_address->id_user = $user->id;
            $user_address->type = 1;
            $user_address->address = $request->address;
            $user_address->department = $request->department;
            $user_address->state = $request->population;
            $user_address->save();

            $sub = 0;
            
            foreach (Session::get('itemsCar') as $key => $value) { $sub += $value->subTotal; }

            if(Session::get('shipping_zone_method')){ $envio = Session::get('shipping_zone_method'); }else{ $envio = 0; }

            $total = $sub + $envio;

            $orders = new Orders;
            $orders->id_user = $user->id;
            $orders->id_status = 1;
            $orders->id_billing = $user_address->id;
            $orders->id_shipping = $user_address->id;
            $orders->note = $request->notes;
            $orders->sub_total = $sub;
            $orders->total = $total;
            $orders->envio = $envio;
            $orders->save();

            foreach (Session::get('itemsCar') as $key => $value) {
                $orders_items = new Orders_items;
                $orders_items->id_orders = $orders->id;
                $orders_items->id_product = $value->id;
                $orders_items->value = $value->price;
                $orders_items->quantity = $value->quantity;
                $orders_items->save();

                $products = Products::findOrFail($value->id);
                $products->inventory = $products->inventory - $value->quantity;
                $products->save();
            } 

            Session::forget('itemsCar');
            Session::forget('shipping_zone_method');
            
            return redirect()->route('thanks')->with('status_success','Orden registrada correctamente.');
            
        } catch (Exception $e) {
            return redirect()->back()->with('status_error', "Oops!, Ocurrio un error al registrar la orden");
        }

    }
}
