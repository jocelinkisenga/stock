<?php 

namespace App\Http\Repositorie;

use Illuminate\Support\Facades\DB;

class StockRepositorie {

    public function daily_stock(){
     //$result =   DB::select("SELECT DISTINCT produits.name,
//      (SELECT SUM(hystory_products.new_quantity) AS entries
//          FROM hystory_products, produits 
//          WHERE hystory_products.product_id = produits.id 
//          AND CAST(hystory_products.created_at AS DATE) = CURRENT_DATE ) 
//      AS entries,
//      (SELECT SUM(commandes.quantity_commande) 
//          FROM commandes, produits 
//           WHERE commandes.produit_id = produits.id 
//          AND CAST(commandes.created_at AS DATE) = CURRENT_DATE) 
//      AS outputs
//  FROM produits,commandes,hystory_products 
//  WHERE hystory_products.product_id = produits.id
//  AND commandes.produit_id = produits.id
//  AND CAST( commandes.created_at AS DATE) = CURRENT_DATE 
//  AND CAST( hystory_products.created_at AS DATE) = CURRENT_DATE 
//  GROUP BY produits.name");


$result = DB::table('hystory_products')->join('produits', 'hystory_products.product_id', '=', 'produits.id')
->join('commandes', 'produits.id', '=', 'commandes.produit_id')
->select('produits.name', 'hystory_products.new_quantity', 'produits.quantity','commandes.quantity_commande')
->where("CAST(commandes.created_at AS DATE","=", "CURRENT_DATE")->get();
return $result;
    }
} 