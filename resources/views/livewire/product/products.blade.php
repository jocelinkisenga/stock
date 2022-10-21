

    <div class="main-panel" id="page">
        <div class="content-wrapper">
          <div class="row">


<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-description">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ajouter un produit</button>

<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action=""> 
        <div class="form-group">
        <label for="recipient-name" class="col-form-label">nom:</label>
          <input type="text" wire:model="name" class="form-control" id="recipient-name">
        </div>
        <div class="form-group">
        <label for="recipient-name" class="col-form-label">prix :</label>
          <input type="number" wire:model="price" class="form-control" id="recipient-name">
        </div>

          <div class="form-group">
            <label for="">categorie :</label>
            <select class="form-control" wire:model="categorie_id" id="">
              <option selected>selectionner une categorie</option>
                @foreach ($categories as $item )
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>

          <div class="modal-footer">
            <button  type="submit" class="btn btn-primary" wire:click.prevent="store()">créer</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div> 
    </p>


    <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  @if (session()->has('message'))
                    <div class="alert alert-success">
                      {{session('message')}}
                    </div>
                  @endif
                  <h4 class="card-title">Mes produits </h4><input type="text" id="myInput" class="" onkeyup="myFunction()" placeholder="Search for names..">
                  <p class="card-description">
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr  class="table-info">

                          <th>
                            nom
                          </th>
                          <th>
                            quantité
                          </th>
                          <th>
                          prix
                          </th>

                          <th>
                            ajouter la qté
                          </th>
                          <th>
                            modifier le prix
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                     @foreach ($data as $produit)
                     <tr>
                      <td>
                    {{$produit->name}}
                      </td>
                       <td>
                     {{$produit->quantity}}
                       </td>
                       <td>
                      {{$produit->price}} fc
                       </td>

                       <td>
                       <form wire:ignore.self>
                         <input type="number"  wire:model="produit_quantity">
                       
                         <button type="submit"  class=" btn btn-success btn-sm text-white" wire:click.prevent="ajouter({{$produit->id}})">ajouter</button>
                       </form>                   <!-- Main modal rounded-->
                        
                       </td>
                       <td>
                        <form wire:ignore.self>
                          <input type="number"  wire:model="product_price" wire:key="{{$produit->id}}">
                        
                          <button type="submit"  class=" btn btn-success btn-sm text-white" wire:click.prevent="modifier_prix({{$produit->id}})">ajouter</button>
                        </form>                   <!-- Main modal rounded-->
                         
                       </td>
                     </tr>
                
                     @endforeach
   
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

  </div>
</div>
</div>
          </div>
        </div>
      </div>
    
