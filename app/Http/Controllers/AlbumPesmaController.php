<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesma;

class AlbumPesmaController extends Controller
{
    public function index($album_id)
    {
        $pesme = Pesma::get()->where('album_id', $album_id);
        if (is_null($pesme)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($pesme);
    }
}
