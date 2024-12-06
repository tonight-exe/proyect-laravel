<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Personajes;
use Illuminate\Http\Request;

class personaje extends Controller
{

   public function getAll(){

    $personajes = Personajes::all(); 
       return response()->json($personajes, 200);
   }

    public function createPj(Request $request){
        
        $personajes = Personajes::create([
            'name'=>$request->Name,
            'id_arma'=>$request->id_Arma,
            'id_armadura'=>$request->id_Armadura, 
            'age'=>$request->Age, 
            'img'=>$request->img 
        ]);
        if (!$personajes){
            $data=[
                'message'=>'error al crear personaje',
                'status'=>500
            ];
            return response()->json($data, 500);
        };
        $data = [
            'personaje'=>$personajes,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function deletePj($id){
        $personajes = Personajes::find($id);
        if (!$personajes){
            $data=[
                'message'=>'Personaje no encontrado',
                'status'=> 404
            ];
            return response()->json($data, 404);
        }
        $personajes->delete();
        $data=[
            'message'=>'Personaje eliminado',
            'status' => 200
        ];
        return response()->json($data,200);
    }

    public function modifyPj(Request $request, $id){
        {
            $personajes = Personajes::find($id);
            if (!$personajes){
                $data=[
                    'message'=>'Personaje no encontrado',
                    'status'=> 404
                ];
                return response()->json($data, 404);
            }
    
                $personajes->name = $request->Name;
                $personajes->id_arma = $request->id_Arma;
                $personajes->id_armadura = $request->id_Armadura;
                $personajes->age = $request->Age;
                $personajes->img = $request->img;
                
                $personajes->save();
                $data=[
                    'message'=>'Personaje Modificado',
                    'status' => 200
                ];
            
            return response()->json($data, 200);
        }
}}
