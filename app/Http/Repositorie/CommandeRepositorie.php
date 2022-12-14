<?php

namespace App\Http\Repositorie;

use App\Models\Produit;
use App\Models\Precommande;
use App\Models\Commande;

class CommandeRepositorie
{

        public function produit_by_id(int $produitId)
        {

                Produit::whereId($produitId)->first();
                return true;
        }

        public function commande_by_id(int $commandId, int $produitId)
        {
                $result =  Commande::where('precomande_id', '=', $commandId)->where('produit_id', '=', $produitId)->get();
                if (!empty($result)) {
                        return $result;
                }
        }

        public function update_quantity(int $commandId, int $produitId, $quantity)
        {

                if ($quantity < $this->product_qty($produitId)) {
                        $result =  Commande::where('precomande_id', '=', $commandId)->where('produit_id', '=', $produitId)->first();
                        if (!empty($result)) {
                                $qty = $result->quantity_commande;
                                $new_qty = $qty + $quantity;

                                $result->update([
                                        "quantity_commande" => $new_qty
                                ]);

                                $this->substract_quantity($produitId, $quantity);
                        }
                } else {
                        session()->flash('message', 'vous n\'avez plus bcp des produits');
                }
        }

        public function store_command(int $commandId, int $produitId, $quantity)
        {
                if ($quantity < $this->product_qty($produitId)) {
                        Commande::create([
                                "precomande_id" => $commandId,
                                "produit_id" => $produitId,
                                "quantity_commande" => $quantity
                        ]);
                        $this->substract_quantity($produitId, $quantity);
                } else {
                        session()->flash('message', 'vous n\'avez plus bcp des produits');
                }
        }

        public function commande_by_product($commandId)
        {
                $result =  Commande::where('precomande_id', '=', $commandId)->join('produits', 'commandes.produit_id', '=', 'produits.id')->get(['commandes.*', 'produits.name', 'produits.id as pId']);
                return $result;
        }

        public function substract_quantity($productId, $quantity)
        {
                $result =  Produit::where('id', '=', $productId)->first();
                if (!empty($result)) {
                        $qty = $result->quantity;
                        if ($qty >= $quantity) {
                                $new_qty = $qty - $quantity;

                                $result->update([
                                        "quantity" => $new_qty
                                ]);
                        }
                }
        }

        public function reduire_quantity(int $commandId, int $produitId)
        {
                $result =  Commande::where('precomande_id', '=', $commandId)->where('produit_id', '=', $produitId)->first();
                if (!empty($result)) {
                        $new_qty = $result->quantity_commande - 1;
                        $this->restore_product($produitId, 1);
                        $result->update([
                                'quantity_commande' => $new_qty
                        ]);
                }
        }


        public function delete_commande(int $commandId, int $produitId, $qty)
        {
                $result =  Commande::where('precomande_id', '=', $commandId)->where('produit_id', '=', $produitId)->first();
                if (!empty($result)) {
                        $this->restore_product($produitId, $qty);
                        $result->delete();
                }
        }

        public function  restore_product($productId, $quantity)
        {
                $result =  Produit::where('id', '=', $productId)->first();
                if (!empty($result)) {
                        $qty = $result->quantity;
                        if ($qty >= $quantity) {
                                $new_qty = $qty + $quantity;

                                $result->update([
                                        "quantity" => $new_qty
                                ]);
                        }
                }
        }

        public function product_qty($productId)
        {
                $produit =  Produit::whereId($productId)->first();
                return $produit->quantity;
        }
}
