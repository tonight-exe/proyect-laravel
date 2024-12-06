<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class itemController extends Controller
{
    public function getItem($id){
        $item = Item::find($id);
        if (!$item){
            $data=[
                'message'=>'Item no encontrado',
                'status'=> 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($item, 200);
    }
}