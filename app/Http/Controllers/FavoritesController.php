<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;
use Validator, Hash, DB;

class FavoritesController extends Controller
{
    
    public function list(){
        $favoritos = DB::select( DB::raw("SELECT * FROM `favoritos` WHERE `estado` = 1"));
    }

    public function create(Request $request){

        try{
            $favoritos = favoritos::create([
                'id_user' => $request->get('id_user'),
                'id_video' => $request->get('id_video'),
                'estado' => $request->get('estado')
            ]);
    

        }catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
        }
        
    }

    public function update(Request $request, $id){

        try{
            $favoritos = favoritos::find($id);
            $favoritos->estado = $request->get('estado');
            $favoritos->save();
    

        }catch (\Exception $e) {

            DB::rollback();
            $message = $e->getMessage();
            
        }
    }

    public function delete(){

    }

    
    public function getByUser($id){
        $favoritos = favoritos::where('id_user', $id)-> get();
        
    }

}
