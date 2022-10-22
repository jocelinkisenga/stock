<?php

namespace App\Http\Livewire\Precommande;

use App\Models\Precommande as ModelsPrecommande;
use App\Models\Table;
use Livewire\Component;

class Precommande extends Component
{
    public $tables, $table_id, $precommande;
    public function reset_fields(){
        $this->table_id = "";
    }

    public function render()
    {
        $this->tables = Table::all();
        $this->precommande = ModelsPrecommande::join('tables','precommandes.table_id','=','tables.id')
        ->where('precommandes.status',false)->get(['precommandes.*','tables.name']);
        return view('livewire.precommande.precommande');
    }

    public function store(){

        $valide = $this->validate([
            'table_id'=>"required"
        ]);
        ModelsPrecommande::create($valide);
        $this->reset_fields();
        session()->flash('message','commande crée avec succès');

    }

    public function confirmer(int $id){
        $precommande = ModelsPrecommande::find($id);
        $precommande->update([
            'status'=>true
        ]);

        session()->flash('message','commande confirmer avec succès');
    }
}
