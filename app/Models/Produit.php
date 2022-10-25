<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['categorie_id','name','price','quantity'];

    public function hystories(){
        return $this->hasMany(HystoryProduct::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
