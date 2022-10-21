<?php

namespace App\Http\Livewire\Rapport;

use App\Http\Repositorie\StockRepositorie;
use App\Models\HystoryProduct;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Stockrapport extends Component
{
    public $data, $date_from, $date_to;
    public function render()
    {
      //  $this->data =$this->search();
         
        return view('livewire.rapport.stockrapport');
    }

    public function search(){
      $stock = new StockRepositorie;
     // $result = Db::select("SELECT DATE(created_at)   FROM hystory_products WHERE DATE(created_at) >= '.$this->date_from.' AND  DATE(created_at) <= '.$this->date_to.' " );
       $result = $stock->stock($this->date_from, $this->date_to);
        return dd($result);
    }

}
    