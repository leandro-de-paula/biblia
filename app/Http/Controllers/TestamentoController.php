<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testament = Testamento::create($request->all());

        if ($testament) {
            return response()->json([
                'message' => 'Testament successfully registred.',
                'data' => $request->all()
            ], 201);
        }

        return response()->json([
            'message' => 'Error when registering the testament.',
            'data' => $request->all()
        ], 404);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $testamento)
    {
        $testament = Testamento::find($testamento);
        if($testament) {
            return response()->json([
                'message' => 'Testament found successful',
                'data' => $testament
            ], 200);
        }

        return response()->json([
            'message' => 'Testament not found',
            'data' => $testamento
        ], 404);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $testamento)
    {
        $testament = Testamento::find($testamento);
        
        if($testament) {
            $testament->update($request->all());
            return response()->json([
                'message' =>  'Update successful.',
                'data' => $testament
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
    public function destroy(string $testamento)
    {
        $testament = Testamento::destroy($testamento);
        
        if($testament){
            return response()->json([
                'message' => 'Delete successful',
                'data' => $testamento
            ], 200);
        }

        return response()->json([
            'message' => 'Delete unsuccessful',
            'data' => $testamento
        ], 404);
    }
}
