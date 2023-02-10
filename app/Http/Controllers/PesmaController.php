<?php

namespace App\Http\Controllers;

use App\Http\Resources\PesmeCollection;
use App\Http\Resources\PesmeResource;
use App\Models\Pesma;
use Illuminate\Http\Request;

class PesmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesme = Pesma::all();
        return new PesmeCollection($pesme);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function show($pesma_id)
    {
        $pesma = Pesma::find($pesma_id);
        if(is_null($pesma)){
            return response()->json('Not found', 401);
        }
        else{
            return new  PesmeResource($pesma);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function edit(pesma $pesma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pesma $pesma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesma $pesma)
    {
        //
    }
}
