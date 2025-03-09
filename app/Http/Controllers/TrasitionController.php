<?php

namespace App\Http\Controllers;

use App\Models\Transition;
use App\Service\ApiResponse;
use Illuminate\Http\Request;

class TrasitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Transition = Transition::all();

        return ApiResponse::success($Transition);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Transition = new Transition();

        $Transition->date_criated = now();
        $Transition->tipe = $request->tipe;
        $Transition->value = $request->value;
        $Transition->categoria = $request->categoria;
        $Transition->descricao = $request->descricao;

        $Transition->save();

        return ApiResponse::created($Transition);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
