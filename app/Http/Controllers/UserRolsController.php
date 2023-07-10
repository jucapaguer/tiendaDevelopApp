<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRolsController extends Controller
{

    public function list(){
        $rol = rol::all();
        return $rol;
    }

    public function create(Request $request){

    }

    public function update(Request $request){

    }

    public function delete($id){

    }
  
    public function getById($id){
      $rol = rol::where('id', $id)-> get();
      return response()->json($rol);
    }

}
