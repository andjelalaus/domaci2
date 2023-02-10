<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class UserAlbumController extends Controller
{
    public function index($user_id)
    {

        $albumi = Album::get()->where('user_id', $user_id);
        if(is_null($albumi)){
            return response()->json('Data not found', 404);
        }
        return response()->json($albumi);
    }

}
