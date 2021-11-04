<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model ;

class Producteur extends Model {
   
   protected $table='Producteur';
   protected $primaryKey='id';
   public $timestamps = false ;
   protected $fillable = ['nom', 'localisation', 'mail'];

   public static function findById(Int $id) : Producteur {
      return Producteur::where('id', '=', $id)->firstOrFail();
   }

   public function produit() {
      return $this->hasMany('Produit','id_produit');
   }

}