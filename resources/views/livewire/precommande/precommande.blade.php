

    <div class="main-panel" id="page">
        <div class="content-wrapper">
          <div class="row">


<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-description">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">créer une commande</button>

<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">créer une commande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form> 
            <div class="form-group">
                <label for="">selectionner une table :</label>
                <select class="form-control" wire:model="table_id" id="">
                  <option selected>selectionner une table</option>
                    @foreach ($tables as $item )
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
                  <h4 class="card-title">commandes</h4>  
                  @if (session()->has('message'))
                      <div class="alert alert-success">{{session('message')}}</div>
                  @endif
                  <p class="card-description">
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr  class="table-info">

                          <th>
                            table
                          </th>
                          <th>
                            commander
                          </th>
                          <th>
                            generer facture
                          </th>

                          <th>
                            confirmer
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                    
                      @foreach ($precommande as $item )
                      <tr>
                        <td>{{$item->name}}</td>
                        <td><a href="{{route('new_commande',['id'=>$item->id])}}" class="btn btn-primary btn-sm"> commander</a> </td>
                        <td><a href="{{route('facture',['id'=>$item->id])}}" class="btn btn-primary btn-sm"> générer la facture</a> </td>
                        <td> </td>    
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
    <script>
        window.live.on('categorieStore',()=>{
            $('#exampleModal').modal('hidden');
        })
    </script>
