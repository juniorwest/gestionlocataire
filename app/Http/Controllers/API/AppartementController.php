<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Appartement;
use Illuminate\Http\Request;

class AppartementController extends Controller
{
    public function listA()
    {
        $appartement = Appartement::get();

        response()->json([
            "statut" => "1",
            "appartement" => $appartement
        ]);
    } 

    public function createA(Request $request)
    {
        $request->validate([
            "num_appart" => "required",
            "prix" => "required",
        ]);

        $appartement = new Appartement();
        $appartement->num_appart = $request->num_appart;
        $appartement->prix = $request->prix;
        $appartement->save();

        response()->json([
            "statut" => "1",
            "message" => "appartement créé avec succès"
        ]);
    }

    public function updateA(Request $request, $id)
    {

       $appartement = Appartement::where("id", $id)->exist();

       if($appartement)
       {
       
        $info = Appartement::find($id);
        $info->num_appart = $request->appart;
        $info->prix = $request->prix;
        $info->save();

        return response()->json([
            "statut" => "1",
            "message" => "Appartement créé avec succès"
        ]);
    }else{
        return response()->json([
            "statut" => "0",
            "message" => "Appartement non créé"
        ]);
    }
       
    }

    public function deleteA($id)
    {

       $appartement = Appartement::where("id", $id)->exists();

       if($appartement)
       {

        $appartement = Appartement::find($id);

       $appartement->delete();

       return response()->json([
        "statut" => "1",
        "message" => "Appartement supprimé avec succès"
        
    ]);
        }else
        {
            return response()->json([
                "statut" => "0",
                "message" => "Appartement non supprimé"
            ]);
        }

    }
}
