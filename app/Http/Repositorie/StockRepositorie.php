<?php 

namespace App\Http\Repositorie;

use Illuminate\Support\Facades\DB;

class StockRepositorie {

    public function stock($from, $to){
     $result =   DB::select("SELECT  produits.id, produits.name,
     (SELECT SUM(hystory_products.new_quantity) AS entries
         FROM hystory_products 
         WHERE hystory_products.product_id = produits.id 
         AND DATE(hystory_products.created_at) >= $from AND DATE(hystory_products.created_at) <= $to ) 
     AS entries,
     (SELECT SUM(commandes.quantity_commande) 
         FROM commandes 
          WHERE commandes.produit_id = produits.id 
         AND DATE(commandes.created_at) >= $from AND DATE(commandes.created_at) <= $to) 
     AS outputs
 FROM produits,commandes,hystory_products 
 WHERE hystory_products.product_id = produits.id
 AND commandes.produit_id = produits.id
 AND DATE(commandes.created_at) >= $from AND DATE(commandes.created_at) <= $to
 AND DATE(hystory_products.created_at) >= $from AND DATE(hystory_products.created_at) <= $to
 GROUP BY produits.name");


// $result = "SELECT produit.nom,
// (SELECT SUM(hystory_products.new_quantity) FROM hystory_products 
//                      WHERE hystory_products.product_id = produits.id 
//                      AND  DATE(hystory_products.created_at) >= $from AND DATE(hystory_products.created_at) <= $to )
//                      AS input,
//              (SELECT SUM(commandes.quantity_commande)  
//                  FROM commandes 
//                  WHERE commande.produit_id = produit.id 
//                  AND day(commande.created_at) <= day(CURRENT_DATE)-7)
//                  AS qty_commande, produit.quantite 
//                  AS qty_total, -commande.quantite + produit.quantite as solde
//      FROM produit,commande,quantite_produit 
//      WHERE  commande.produit_id = produit.id 
//      AND day(commande.created_at) <= day(CURRENT_DATE)-7 
//      AND day(quantite_produit.created_at) <= day(CURRENT_DATE)-7  
//      AND quantite_produit.id_produit = produit.id
//      GROUP BY produit.nom ";


//$result = DB::table('hystory_products')->join('produits', 'hystory_products.product_id', '=', 'produits.id')
// ->join('commandes', 'produits.id', '=', 'commandes.produit_id')
// ->select('produits.name', 'hystory_products.new_quantity', 'produits.quantity','commandes.quantity_commande')
// ->where("CAST(commandes.created_at AS DATE","=", "CURRENT_DATE")->get();
return $result;
    }
} 