<?php

namespace App\Http\Controllers;

use App\Http\Resources\PesmeCollection;
use App\Http\Resources\PesmeResource;
use App\Models\Album;
use App\Models\Pesma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(),[

            'ime' => 'required|string|max:100',
            'trajanje' => 'required|integer',
            'dodatan_izvodjac' => 'string',
            'album_id' => 'required|integer|max:100',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $pesma = Pesma::create([
            'ime' => $request->ime,
            'trajanje' =>  $request->trajanje,
            'dodatan_izvodjac' =>  $request->dodatan_izvodjac,
            'album_id' =>$request->album_id,
            
        ]);
        return response()->json(['Pesma kreirana uspesno',new PesmeResource($pesma)]);
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
        $validator = Validator::make($request->all(),[

            'ime' => 'required|string|max:100',
            'trajanje' => 'required|integer',
            'dodatan_izvodjac' => 'string',
            'album_id' => 'required|integer|max:100',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
      
        $pesma->ime = $request->ime;
        $pesma->trajanje = $request->trajanje;
        $pesma->dodatan_izvodjac = $request->dodatan_izvodjac;
        $pesma->album_id = $request->album_id;

        $pesma->save();
        return response()->json(['Pesma update uspesno',new PesmeResource($pesma)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pesma  $pesma
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesma $pesma)
    {
        $pesma->delete();
        return response()->json('Pesma obrisan uspesno');
    }
}
