<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping_zone_methods;

use Validator, Hash, DB;

class AdminShippingZoneMethodsController extends Controller
{
    function index(){

        $shipping_zone_methods = Shipping_zone_methods::all();

        return view('admin.orders.shippingzonemethod', compact('shipping_zone_methods'));

    }

    function create(Request $request){

        $categories = new Shipping_zone_methods;
        $categories->name = $request->name;
        $categories->value = $request->value;
        $categories->save();

        $shipping_zone_methods = Shipping_zone_methods::all();
        return redirect()->route('admin.shipping', compact('shipping_zone_methods'))->with('status_success','Se agrego el método de envió.');
    }

    function delete($id){
        Shipping_zone_methods::where('id', $id)->delete();

        $shipping_zone_methods = Shipping_zone_methods::all();
        return redirect()->route('admin.shipping', compact('shipping_zone_methods'))->with('status_success','Se elimino el método de envió.');
    }
}
