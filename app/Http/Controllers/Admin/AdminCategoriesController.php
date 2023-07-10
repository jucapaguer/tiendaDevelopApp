<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Categories;
use App\Models\Products;

use Validator, Hash, DB;

class AdminCategoriesController extends Controller
{
   /*  public function __construct() {

        $this->middleware('auth');
    } */

    function index(){

        $categories = Categories::all();

        return view('admin.products.categories', compact('categories'));

    }

    function create(Request $request){


        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $request->name);
        $slug = strtolower($slug);
        $slug = str_replace(' ', '_', $slug);

        if ($request->hasFile('file')) {

            $imagen = $request->file('file');
            $nombre = time().'_'.$imagen->getClientOriginalName();
            $ruta = public_path().'/imagenes';
            $imagen->move($ruta , $nombre);
            $urlimagenes = '/imagenes/categories/'.$nombre;
        }else{
            $urlimagenes = '/imagenes/categories/default.png';
        }

        $categories = new Categories;
        $categories->slug = $slug;
        $categories->name = $request->name;
        $categories->save();


        $categories = Categories::all();
        return redirect()->route('admin.categorie', compact('categories'))->with('status_success','Se agrego la categoria.');
    }

    function update(Request $request){

        if(Products::where('id_categories', $request->id)->get()){
            $mensaje = "No se puede editar una categoria cuando tiene productos asignados a ella.";
            $stado = "status_error";
        }else{

            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $request->name);
            $slug = strtolower($slug);
            $slug = str_replace(' ', '_', $slug);

            $categories = Categories::findOrFail($request->id);
            $categories->slug = $slug;
            $categories->name = $request->name;
            $categories->save();
            $mensaje = "Se actualizo la categoria.";
            $stado = "status_success";
        }


        $categories = Categories::all();
        return redirect()->route('admin.categorie', compact('categories'))->with($stado,$mensaje);
    }

    function delete($id){

        if(Products::where('id_categories', $id)->get()){
            $mensaje = "No se puede eliminar una categoria cuando tiene productos asignados a ella.";
            $stado = "status_error";
        }else{
            Categories::where('id', $id)->delete();
            $mensaje = "Se elimino la categoria.";
            $stado = "status_success";
        }

        $categories = Categories::all();
        return redirect()->route('admin.categorie', compact('categories'))->with($stado,$mensaje);
    }
}
