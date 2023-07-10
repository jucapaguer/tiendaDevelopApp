<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Products;
use App\Models\Products_details;
use App\Models\Categories;
use App\Models\Status;

use Validator, Hash, DB;

class AdminProductsController extends Controller
{
    function index(){

        $products = $this->dataSource();

        return view('admin.products.product', compact('products'));

    }

    function create(Request $request){

        
        
        try {
            if ($request->hasFile('file')) {

                $imagen = $request->file('file');
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/imagenes';
                $imagen->move($ruta , $nombre);
                $urlimagenes = '/imagenes/'.$nombre;
            }else{
                $urlimagenes = '/imagenes/default.png';
            }

            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $request->name);
            $slug = strtolower($slug);
            $slug = str_replace(' ', '_', $slug);

            $products = new Products;
            $products->id_categories = $request->categoria;
            $products->id_status = 1;
            $products->name = $request->name;
            $products->slug = $slug;
            $products->picture = $urlimagenes;
            $products->short_description = $request->shortdescription;
            $products->description = $request->description;
            $products->inventory = $request->inventario;
            $products->price = $request->precio;
            $products->sale_price = $request->descuento;
            $products->save();

            $idProduct = $products->id;

            foreach( $request->nombres as $indice => $nombre ){
                $description = $request->descriptionAttribute[$indice];

                $productsAttributes = new Products_details;
                $productsAttributes->id_product =  $idProduct;
                $productsAttributes->name = $nombre;
                $productsAttributes->description = $description;
                $productsAttributes->save();
            }

            $mensaje = "Se agrego el producto correctamente";
        } catch (Exception $e) {
            $mensaje = "Oops!, Ocurrio un error al agregar el producto";
        }
       
       $products = $this->dataSource();
        return redirect()->route('admin.product', compact('products'))->with('status_success',$mensaje);
  
    }

    function delete($id){
        Products_details::where('id_product', $id)->delete();
        Products::where('id', $id)->delete();

        $products = $this->dataSource();
        return redirect()->route('admin.product', compact('products'))->with('status_success','Se elimino el producto.');
    }

    function dataSource(){
        $products = Products::all();

        foreach ($products as $product) {
            $product->additionalData = Products_details::where('id_product', '=', $product->id)->get();
            $product->categorieData = Categories::where('id', '=', $product->id_categories)->get();
            $product->statusData = Status::where('id', '=', $product->id_status)->get();
        }

        $products->categoriesData = Categories::all();

        return $products;
    }

}
