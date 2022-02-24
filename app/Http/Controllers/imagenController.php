<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class imagenController extends Controller
{
    public function subirImagen(Request $req){ //Pide: user_id, api_token (opcional para saber que es un tatuador) || Devuelve: "status" "msg" y "[{post}]"
        $jdata = $req->getContent();
        $data = json_decode($jdata);

        $response["status"]=1;
        try{
            if(isset($data->user_id) && isset($data->api_token)){

            }else{
                throw new Exception("Error: Introduce user_id y api_token (aunque esté vacio)");
            }
        }catch(\Exception $e){
            $response["status"]=0;
            $response["msg"]=$e->getMessage();
        }
        return response()->json($response);
    }

    public function descargarImagen(Request $req){ //Pide: user_id, api_token (opcional para saber que es un tatuador) || Devuelve: "status" "msg" y "[{post}]"
        $jdata = $req->getContent();
        $data = json_decode($jdata);

        $response["status"]=1;
        try{
            if(isset($data->user_id) && isset($data->api_token)){

            }else{
                throw new Exception("Error: Introduce user_id y api_token (aunque esté vacio)");
            }
        }catch(\Exception $e){
            $response["status"]=0;
            $response["msg"]=$e->getMessage();
        }
        return response()->json($response);
    }
}
