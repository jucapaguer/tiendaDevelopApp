<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Products_details;
use App\Models\Status;

use Validator, Hash, DB;

class CategoriesController extends Controller
{
   /*  public function __construct() {

        $this->middleware('auth');
    } */

    function show($id){
        $products = Products::where('id_categories', $id)->get();

        foreach ($products as $product) {
            $product->additionalData = Products_details::where('id_product', '=', $product->id)->get();
            $product->categorieData = Categories::where('id', '=', $product->id_categories)->get();
            $product->statusData = Status::where('id', '=', $product->id_status)->get();
        }

        return view('store.categories', compact('products'));

    }

    
}
