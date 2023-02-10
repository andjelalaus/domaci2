<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumCollection;
use App\Http\Resources\AlbumResource;
use App\Models\album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumi = Album::all();
        return new AlbumCollection($albumi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
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
            'naziv' => 'required|string|max:100',
            'datum' => 'required|date',
            'izdavacka_kuca' => 'required|string',
            'opis' => 'required|string|max:250',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $album = Album::create([
            'naziv' => $request->naziv,
            'datum' =>  $request->datum,
            'izdavacka_kuca' =>  $request->izdavacka_kuca,
            'opis' => $request->opis,
            'user_id' => Auth::user()->id,
        ]);
        return response()->json(['Album kreiran uspesno',new AlbumResource($album)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($album_id)
    {
        $album = Album::find($album_id);
        if(is_null($album)){
            return response()->json('Not found', 401);
        }
        else{
            return new  AlbumResource($album);
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, album $album)
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:100',
            'datum' => 'required|date',
            'izdavacka_kuca' => 'required|string|max:100',
            'opis' => 'required|string|max:250',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $album->naziv = $request->naziv;
        $album->datum = $request->datum;
        $album->izdavacka_kuca = $request->izdavacka_kuca;
        $album->opis = $request->opis;

        $album->save();
        return response()->json(['Album update uspesno',new AlbumResource($album)]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(album $album)
    {
        $album->delete();
        return response()->json('Album obrisan uspesno');
    }
}
