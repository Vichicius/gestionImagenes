<?php

namespace App\Http\Controllers;

use App\Models\ejemplo;
use Exception;
use Illuminate\Http\Request;

class imagenController extends Controller
{
    public function subirImagen(Request $req){ //Pide: imagen || Devuelve: "status" "msg" y "[{post}]"
        $jdata = $req->getContent();
        $data = json_decode($jdata);

        $response["status"]=1;
        try{
            if(isset($data->imagen)){
                $imagen = $data->imagen;
                $data->imagen->file('archivoInput')->storeAs('archivos', $imagen->getClientOriginalName());
                $ejemplo = new ejemplo();
                $ejemplo->photo = "desarrolladorapp.com/inkme/public/archivos/".$imagen->getClientOriginalName();
                $ejemplo->save();
                $response["photo"] = $ejemplo;
            }else{
                throw new Exception("Error: Introduce imagen");
            }
        }catch(\Exception $e){
            $response["status"]=0;
            $response["msg"]=$e->getMessage();
        }
        return response()->json($response);
    }

    public function descargarImagen(Request $req){ //Pide: id || Devuelve: "status" "msg" y "[{post}]"
        $jdata = $req->getContent();
        $data = json_decode($jdata);

        $response["status"]=1;
        try{
            if(isset($data->id)){
                $response['photo'] = ejemplo::find($data->id);
            }else{
                throw new Exception("Error: Introduce id y api_token (aunque esté vacio)");
            }
        }catch(\Exception $e){
            $response["status"]=0;
            $response["msg"]=$e->getMessage();
        }
        return response()->json($response);
    }
}
