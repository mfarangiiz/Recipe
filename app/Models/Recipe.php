<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Recipe extends Model
{
    use HasFactory;

    /**
     * Modelga tegishli jadval nomi.
     */

    protected $fillable = [
        'name',
        'ingredients',
        'instructions',
        'image',
        'status',
        'user', // Foydalanuvchi identifikatori
    ];

//    // Foydalanuvchi bilan aloqani o'rnatish
//    public function user()
//    {
//        return $this->belongsTo(Client::class, 'client_id');
//    }

}
