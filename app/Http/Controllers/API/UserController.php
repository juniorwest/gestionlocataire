<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUsers()
    {
        $utilisateurs = User::get();

        response()->json([
            "statut" => "1",
            "utilisateurs" => $utilisateurs
        ]);
    } 

    public function create(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required|unique:password",
            "admin" => ""
        ]);

        $utilisateur = new User();
        $utilisateur->name = $request->name;
        $utilisateur->email = $request->email;
        $utilisateur->password = $request->password;
        $utilisateur->save();

        response()->json([
            "statut" => "1",
            "message" => "Utilisateur créé avec succès"
        ]);
    }

    public function update(Request $request, $id)
    {

       $utilisateur = User::where("id", $id)->exist();

       if($utilisateur)
       {
       
        $info = User::find($id);
        $info->name = $request->name;
        $info->email = $request->email;
        $info->password = $request->password;
        $info->save();

        return response()->json([
            "statut" => "1",
            "message" => "Utilisateur créé avec succès"
        ]);
    }else{
        return response()->json([
            "statut" => "0",
            "message" => "Utilisateur non créé"
        ]);
    }
       
    }

    public function delete($id)
    {

       $utilisateur = User::where("id", $id)->exists();

       if($utilisateur)
       {

        $utilisateur = User::find($id);

       $utilisateur->delete();

       return response()->json([
        "statut" => "1",
        "message" => "Utilisateur supprimé avec succès"
        
    ]);
        }else
        {
            return response()->json([
                "statut" => "0",
                "message" => "Utilisateur non supprimé"
            ]);
        }

    }
}
