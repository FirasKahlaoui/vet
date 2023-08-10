<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{


    public function mesanimeaux(){
        $mesanim = DB::table('animals')->where('user_id', Auth::user()->id)->get();



        return view('animeaux.mesanimeaux', compact('mesanim'));

    }

    public function accouplement(){
        // $mesanim = DB::table('animals')->where('user_id', Auth::user()->id)->get();



        return view('animeaux.accouplement');

    }




    public function addanimal(Request $request)
{
    // Validation des données du formulaire
    $validatedData = $request->validate([
        'type' => 'required',
        'nom' => 'required',
        'date_naissance' => 'required|date',
        'race' => 'required',
        'sex' => 'required',
        'image' => 'required|image|max:2048', // Exemple de validation pour un fichier image (max:2048 Ko)
    ]);

    // Récupération de l'utilisateur connecté
    $user = Auth::user();

    // Gestion de l'image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = $image->hashName();
        $image->storeAs('public/animal-images', $fileName);
        $imagePath = $fileName;
    } else {
        // Gérer le cas où aucune image n'est téléchargée
        $imagePath = null;
    }

    // Insertion des données dans la table "animals" en utilisant Query Builder
    DB::table('animals')->insert([
        'user_id' => $user->id,
        'type' => $validatedData['type'],
        'nom' => $validatedData['nom'],
        'sex' => $validatedData['sex'],
        'date_naissance' => $validatedData['date_naissance'],
        'race' => $validatedData['race'],
        'image' => $imagePath,
    ]);

    // Redirection ou autre traitement
    // ...

    return redirect()->route("mesanimeaux")->with('success', 'Animal ajouté avec succès');
}


// public function searchchien(Request $request)
// {
//     $sex = $request->input('sex');
//     $race = $request->input('race');
//     $type = $request->input('type');

//     if ($race == "toutes" && $sex == "toutes" && $type == "toutes") {
//         $animals = DB::table('animals')->get();
//     } else {
//         $animals = DB::table('animals')
//             ->when($sex != "toutes", function ($query) use ($sex) {
//                 return $query->where('sex', $sex);
//             })
//             ->when($race != "toutes", function ($query) use ($race) {
//                 return $query->where('race', $race);
//             })
//             ->when($type != "toutes", function ($query) use ($type) {
//                 return $query->where('type', $type);
//             })
//             ->get();
//     }

//     return response()->json($animals);
// }

public function searchchien(Request $request)
{
    $sex = $request->input('sex');
    $race = $request->input('race');
    $type = $request->input('type');

    if ($race == "toutes" && $sex == "toutes" && $type == "toutes") {
        $animals = DB::table('animals')
            ->join('users', 'animals.user_id', '=', 'users.id')
            ->select('animals.*', 'users.name as user_name')
            ->get();
    } else {
        $animals = DB::table('animals')
            ->join('users', 'animals.user_id', '=', 'users.id')
            ->select('animals.*', 'users.name as user_name')
            ->when($sex != "toutes", function ($query) use ($sex) {
                return $query->where('animals.sex', $sex);
            })
            ->when($race != "toutes", function ($query) use ($race) {
                return $query->where('animals.race', $race);
            })
            ->when($type != "toutes", function ($query) use ($type) {
                return $query->where('animals.type', $type);
            })
            ->get();
    }

    return response()->json($animals);
}



public function getRaces(Request $request)
{
    $type = $request->query('type');
    $races = [];

    if ($type == 'chien') {
        $races = DB::table('racechien')->pluck('race', 'id')->toArray();
    } elseif ($type == 'chat') {
        $races = DB::table('racechat')->pluck('race', 'id')->toArray();
    }

    return response()->json($races);
}

// page selectionner un animal pour matcher
public function editmatch($id){
    $animal = DB::table('animals')->find($id);
    $propriétaire = DB::table('users')->where('id',$animal->user_id)->first();
    $myanimal = DB::table('animals')->where('user_id', Auth::user()->id)->get();
    return view('animeaux.match',compact('animal','propriétaire','myanimal'));

}




// demande match 
public function demandematch(Request $request)
{
    // Validation des données du formulaire
    $validatedData = $request->validate([
        'animal1' => 'required',
        'animal2' => 'required',
        'message'=> 'max: 300',
    ]);

    // Récupération de l'utilisateur connecté
    // $user1 = Auth::user();
    $animaltest = DB::table('animals')->where('id',$validatedData['animal2'])->first();

$user2 = DB::table('users')->where('id',$animaltest->user_id)->first();

    // Insertion des données dans la table "animals" en utilisant Query Builder
    DB::table('match')->insert([
        'animal1' => $validatedData['animal1'],
        'animal2' => $validatedData['animal2'],
        'user1' => Auth::user()->id,
        'user2' => $user2->id,
        'message' => $validatedData['message'],
    ]);

    // Redirection ou autre traitement
    // ...

    return redirect()->route("accouplement")->with('success', 'demande envoyée avec succès');
}


public function demande(){
    $demande = DB::table('match')
    ->join('users', 'match.user1', '=', 'users.id')
    ->join('animals', 'match.animal1', '=', 'animals.id')
    ->where('match.user2', Auth::user()->id)
    ->get();


    return view('animeaux.demande', compact('demande'));

}







}
