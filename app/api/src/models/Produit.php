<?php
namespace models;

use \Illuminate\Database\Eloquent\Model ;
use \Illuminate\Database\Eloquent\ModelNotFoundException ;



class Produit extends Model {
   protected $table='Produit';
   protected $primaryKey='id';


   public static function findById(Int $id) : Produit {
      return Produit::where('id', '=', $id)->firstOrFail();
   }

   public function commandes() {
      return $this-> belongsToMany('td1\Item',
         'quantite', //table pivot
         'id_commande',
         'id_produit');
   }

   public function producteur() {
      return $this->belongsTo('Producteur','id_producteur');
   }

   public function commande() {
      return $this->belongsTo('Categorie','id_categorie');
   }

}

