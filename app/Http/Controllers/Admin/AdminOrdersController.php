<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Orders;
use App\Models\Orders_items;
use App\Models\Orders_notes;
use App\Models\Products;
use App\Models\User;
use App\Models\User_address;

use Validator, Hash, DB;

class AdminOrdersController extends Controller
{
    function index(){

        $orders = Orders::all();

        foreach ($orders as $order) {

            $items = Orders_items::where('id_orders', '=', $order->id)->get();
            foreach ($items as $item) {
                $item->data = Products::where('id', '=', $item->id_product)->get();
            }

            $order->items = $items;
            $order->user = User::where('id', '=', $order->id_user)->get();
            $order->user_address = User_address::where('id_user', '=', $order->id_user)->get();
        }

        return view('admin.orders.dashboard', compact('orders'));

    }
}
