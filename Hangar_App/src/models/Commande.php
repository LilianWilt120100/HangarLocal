<?php
namespace App\Models;

use \Illuminate\Database\Eloquent\Model ;

class Commande extends Model {
 protected $table='Commande';
 protected $primaryKey='id';



 public function produits() {
    return $this-> belongsToMany('td1\Item',
        'quantite', //table pivot
        'id_commande',
        'id_produit');
 }

}