<?php
namespace src\models;

class Producteur extends \Illuminate\Database\Eloquent\Model {
   protected $table='Producteur';
   protected $primaryKey='id';

   protected $fillable = ['nom', 'localisation', 'mail'];

   public static function findById(Int $id) : Producteur {
      return Producteur::where('id', '=', $id)->firstOrFail();
   }

   public function produit() {
      return $this->hasMany('Produit','id_produit');
   }

   public function store($input) {

      $pEur = Producteur::create([
          'nom' => $input['nom'],
          'localisation' => $input['localisation'],
          'mail' => $input['mail']
      ]);

      //TODO
      //DB::beginTransaction();
      //try intégrité des champs
      //DB::commit();

      
  }
}