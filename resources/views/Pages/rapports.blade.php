@extends('layouts.app')
@section('content')
    <div class="main-panel" id="page">
        <div class="content-wrapper">


<div class="row">

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">filtrer par date</h4>
                <div class="template-demo">
                    <form action="{{route('search')}}" method="POST">
                        @csrf
                        <div class="input-group input-daterange">
                            <input name="date_from" type="date" class="mr-2 form-control datepicker"
                                placeholder="Due Date" autocomplete="off" data-provide="datepicker"
                                data-date-autoclose="true" data-date-format="yyyy/mm/dd"
                                data-date-today-highlight="true">
                            <div class="uppercase input-group-addon">Au</div>
                            <input name="date_to" type="date" class="ml-2 form-control datepicker"
                                placeholder="Due Date" autocomplete="off" data-provide="datepicker"
                                data-date-autoclose="true" data-date-format="yyyy/mm/dd"
                                data-date-today-highlight="true">
                            <button type="submit" class="ml-2 btn btn-success btn-sm" wire:click.prevent="search()"><i
                                    class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <p class="card-description">
                                <button type="button" class="btn btn-success" onclick="generatePDF()" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Télécharger le rapport</button>

                            </p>
                            
                            <div id="text">

                                <div class="col-lg-12 stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">rapport du</h4>
                                            <p class="card-description">
                                            </p>
                                            <div class="table-responsive pt-3">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="table-info">
                                                            <th>
                                                                #
                                                            </th>
                                                            <th>
                                                                produit
                                                            </th>
                                                            <th>
                                                                Entées
                                                            </th>
                                                            <th>
                                                                Sorties
                                                            </th>
                                                            <th>
                                                              solde
                                                            </th>

                                                            <th>
                                                                PV
                                                            </th>
                                                            <th>
                                                               vente total
                                                            </th>
                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $key => $item)
                                                        <tr>
                                                            <td>
                                                                {{$key+1}}
                                                            </td>
                                                            <td>
                                                                {{$item->name}}
                                                            </td>
                                                            <td>

                                                                {{$item->entries}}
                                                            </td>
                                                            <td>
                                                                {{$item->outputs}}
                                                            </td>
                                                            <td>
                                                            {{($item->solde + $item->entries) - $item->outputs }} 
                                                            </td>

                                                            <td>
                                                            {{$item->vente }} fc
                                                            </td>
                                                            <td>
                                                                {{$item->vente *  $item->outputs }}  fc
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
    </div>
@endsection
