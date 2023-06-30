<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versiculo;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $verse = Versiculo::create($request->all());
        if($verse){
            return response()->json([
                'message' => 'Verse successfully registered.',
                'data' => $request->all()
            ], 201);
        }

        return response()->json([
            'message' => 'Error when registering the verse.',
            'data' => $request->all()
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $versiculo)
    {
        $verse = Versiculo::find($versiculo);
        if ($verse) {
            return response()->json([
                'message' => 'Verse found successful',
                'data' => $verse 
            ], 200);
        }

        return response()->json([
            'message' => 'Verse not found',
            'data' => $versiculo
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $versiculo)
    {
        $verse = Versiculo::find($versiculo);
        if ($verse) {
            $verse->update($request->all());
            return response()->json([
                'message' => 'Update successful.',
                'data' => $verse
            ], 200);
        }
        
        return response()->json([
            'message' => 'Update unsuccessful.',
            'data' => $request->all()
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $versiculo)
    {
        $verse = Versiculo::destroy($versiculo);
        
        if($verse){
            return response()->json([
                'message' => 'Delete successful',
                'data' => $versiculo
            ], 200);
        }

        return response()->json([
            'message' => 'Delete unsuccessful',
            'data' => $versiculo
        ], 404);
    }
}
