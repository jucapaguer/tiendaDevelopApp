<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Orders;
use App\Models\Orders_items;
use App\Models\Orders_notes;

use Validator, Hash, DB;

class AdminOrdersController extends Controller
{
    function index(){

        $products = $this->dataSource();

        return view('admin.products.product', compact('products'));

    }

    function dataSource(){
        $products = Orders::all();

        foreach ($products as $product) {
            $product->additionalData = Orders_items::where('id_product', '=', $product->id)->get();
            $product->categorieData = Orders_notes::where('id', '=', $product->id_categories)->get();
        }

        return $products;
    }
}
