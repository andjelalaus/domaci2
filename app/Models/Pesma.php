<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesma extends Model
{
    use HasFactory;

    protected $fillable = [
        'ime',
        'trajanje',
        'dodatan_izvodjac',
        'album_id'
    ];
    public function album(){
        return $this->belongsTo(Album::class);
    }
}
