<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Locataire;
use Illuminate\Http\Request;

class LocataireController extends Controller
{
    public function listL()
    {
        $locataire = Locataire::get();

        response()->json([
            "statut" => "1",
            "appartement" => $locataire
        ]);
    } 

    public function createL(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "telephone" => "required",
            "montant_p" => "required",
            "montant_r" => "required",
            "num_apart" => "required",
        ]);

        $locataire = new Locataire();
        $locataire->nom = $request->nom;
        $locataire->telephone = $request->telephone;
        $locataire->montant_p = $request->montant_p;
        $locataire->montant_r = $request->montant_r;
        $locataire->num_apart = $request->num_apart;
        $locataire->save();

        response()->json([
            "statut" => "1",
            "message" => "locataire créé avec succès"
        ]);
    }

    public function updateL(Request $request, $id)
    {

       $locataire = Locataire::where("id", $id)->exist();

       if($locataire)
       {
        $locataire = Locataire::find($id);
       
        $locataire->nom = $request->nom;
        $locataire->telephone = $request->telephone;
        $locataire->montant_p = $request->montant_p;
        $locataire->montant_r = $request->montant_r;
        $locataire->num_apart = $request->num_apart;
        $locataire->save();

        return response()->json([
            "statut" => "1",
            "message" => "Locataire créé avec succès"
        ]);
    }else{
        return response()->json([
            "statut" => "0",
            "message" => "Locataire non créé"
        ]);
    }
       
    }

    public function deleteL($id)
    {
        $locataire = Locataire::where("id", $id)->exists();

       if($locataire)
       {

        $locataire = Locataire::find($id);

       $locataire->delete();

       return response()->json([
        "statut" => "1",
        "message" => "Locataire supprimé avec succès"
        
    ]);
        }else
        {
            return response()->json([
                "statut" => "0",
                "message" => "Locataire non supprimé"
            ]);
        }

    }
}
