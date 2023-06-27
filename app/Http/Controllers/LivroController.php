<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Livro::create($request->all())) {
            return response()->json([
                'message' => 'Book successfully registered.',
                'data' => $request->all()
            ], 201);
        }
        return response()->json([
            'message' => 'Error when registering the book.',
            'data' => $request->all()
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $livro)
    {
        $book = Livro::find($livro);
        if($book) {
            return response()->json([
                'message' => 'Book found successful',
                'data' => $book
            ], 200);
        }

        return response()->json([
            'message' => 'Book not found',
            'data' => $livro
        ], 404);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $book = Livro::find($livro);
        
        if($book) {
            $book->update($request->all());
            return response()->json([
                'message' =>  'Update successful.',
                'data' => $book
            ], 200);
        }

        return response()->json([
            'massege' => 'Update unsuccessful.',
            'data' => $request->all()
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $livro)
    {
        $book = Livro::destroy($livro);
        
        if($book){
            return response()->json([
                'message' => 'Delete successful',
                'data' => $livro
            ], 200);
        }

        return response()->json([
            'message' => 'Delete unsuccessful',
            'data' => $livro
        ], 404);
    }
}
