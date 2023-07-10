<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Products;
use App\Models\Products_details;
use App\Models\Categories;
use App\Models\Status;

use Validator, Hash, DB;

class InicioController extends Controller
{
    function index(){

        $products = Products::take(8)->get();

        foreach ($products as $product) {
            $product->additionalData = Products_details::where('id_product', '=', $product->id)->get();
            $product->categorieData = Categories::where('id', '=', $product->id_categories)->get();
            $product->statusData = Status::where('id', '=', $product->id_status)->get();
        }

        $products->categoriesData = Categories::all();

        return view('inicio', compact('products'));

    }

}
