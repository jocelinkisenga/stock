<?php

namespace App\Http\Livewire\Rapport;

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
       
      $result = Db::table('hystory_products')->select()->where("CAST(created_at AS DATE)",">=",$this->date_from)
        ->where("CAST(created_at AS DATE)","<=",$this->date_to)->get();
       
        return dd($result);
    }

}
    