<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model ;

class Categorie extends Model {
   
   protected $table='categorieproduit';
   protected $primaryKey='id';
   public $timestamps = false ;
   protected $fillable = ['nom', 'description'];


   public function produit() {
      return $this->hasMany('Produit','id_categorie');
   }

}