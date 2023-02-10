<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'naziv',
        'datum',
        'izadvacka_kuca',
        'opis',
    ];
    public function pesme(){
        return $this->hasMany(Pesma::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}