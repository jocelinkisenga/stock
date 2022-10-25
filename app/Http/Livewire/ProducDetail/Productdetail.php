<?php

namespace App\Http\Livewire\ProducDetail;

use App\Models\Produit;
use Livewire\Component;
use App\Models\HystoryProduct;

class Productdetail extends Component
{
    public $data, $product_id;

    public function render()
    {
      
      $this->data =  Produit::findOrFail($this->product_id);
    

        return view('livewire.produc-detail.productdetail');
    }

    
    public function ajouter()
    {

        $produit = Produit::find($this->produit_id);
        $old_quantity = $produit->quantity;

        $history =  HystoryProduct::create([
            'product_id' => $this->produit_id,
            'new_quantity' => $this->produit_quantity,
            'old_quantity' => $old_quantity,
            'prix_achat' => $this->prix_achat
        ]);
        if ($history) {
            $updated_quantity = $old_quantity + $this->produit_quantity;
            $produit->update([
                'quantity' => $updated_quantity
            ]);
            $this->reset_fields();
            session()->flash('message', 'quantite ajouté');
        }
    }
}
