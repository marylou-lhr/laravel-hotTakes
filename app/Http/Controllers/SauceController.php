<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sauce;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sauces = Sauce::all();
        return view('sauces.index', compact('sauces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sauces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Vérification des données
        $validated = donneesValidees($request);

        //Si les données sont OK, on crée la sauce
        $sauce = Sauce::create($validated);

        //Message de confirmation
        return response()->json($sauce, 201); //201 = Code pour informer l'utilisateur que la sauce a été créée avec succès
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sauce = Sauce::findOrFail($id);
        return view('sauces.show', compact('sauce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (sauceTrouvee($id)){
            return response()->json($sauceTrouvee);
        }
        else{
            return sauceTrouvee($id);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = donneesValidees($request);
        if (sauceTrouvee($id)){
            $sauce->update($validated);
            show($id);
        }
        else{
            return sauceTrouvee($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (sauceTrouvee($id)){
            $sauceTrouvee->delete();
            return response()->json(['message' => "The sauce has been successfully deleted."]);
        }
        else{
            return sauceTrouvee($id);
        }
    }

    public function like(Request $request, string $id){
        $request->validate([
            'idUtilisateur' => 'required|string',
            'aLike' => 'required|integer',
        ]);
        
        $sauce = Sauce::findOrFail($id);
        $idUtilisateur = $request->idUtilisateur;
        $aLike = $request->aLike;

        //Vérifier si le tableau des utilisateurs qui ont likés est vide
        if (!is_array($sauce->usersLiked)) {
            $sauce->usersLiked = [];
        }
        if ($aLike == 1){
            //Si l'utilisateur n'a pas déjà liké
            if (!in_array($userId, $sauce->usersLiked)) {
                $sauce->usersLiked[] = $userId;
                $sauce->likes++;
            }
        }
        elseif ($aLike == 0) {
            //Si l'utilisateur a déjà liké, alors ça veut dire qu'il faut l'enlever
            if (($key = array_search($userId, $sauce->usersLiked))) {
                unset($sauce->usersLiked[$key]);
                $sauce->likes--;
            }
        }

        $sauce->save(); //Sauvegarder les modifications

        return response()->json(['message' => 'Successfully updated.']);

    }

    /** 
     * Fonctions privées
    */
    private function donneesValidees(Request $request){
        $validated = $request->validate([
            'userId' => 'required|integer',
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'mainPepper' => 'required|string|max:255',
            'imageUrl' => 'required|url',
            'heat' => 'required|integer|min:1|max:10',
            'likes' => 'required|integer',
            'dislikes' => 'required|integer',
            'usersLiked' => 'nullable|array',
            'usersDisliked' => 'nullable|array',
        ]);

        return $validated;
    }

    private function sauceTrouvee(string $id){
        $sauceTrouvee = Sauce::find($id);
        if (!$sauceTrouvee){
            return response()->json(['error' => "The sauce doesn't exist."], 404);
        }
        
        return true;
    }
}
