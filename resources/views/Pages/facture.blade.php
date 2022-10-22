@extends('layouts.app')
@section('content')
    <?php global $item_total; ?>
    <div class="main-panel" id="page">
        <div class="content-wrapper">
            <div class="row justify-start">
                <div class="card-footer">
                    <button id="basic" class="btn btn-default"><i class="fas fa-print"></i> </button>
                    <button type="" class="float-right"><i class="far fa-credit-card"></i>
                       
                    </button>
                    <button type="button" id="print" class="float-right btn btn-primary" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> imprimer la facture
                    </button>
                </div>
            </div>
            <div class="row justify-center">
                <div class="wrapper ml-9 mt-4 col-6">
                    <div id="myPrintable">
                        <div class="card">
                            <div class="card-header ">
                                <a class="pt-2 ">The king</a>
                                <div class="float-right">
                                    <h3 class="mb-0"></h3>
                                    Date: <?= date('Y/m/d') ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>produit</th>
                                                <th class="right">quantité</th>
                                                <th class="right">sous-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($results as $item)
                                                <tr>

                                                    <td class="left strong text-uppercase">{{ $item->name }}</td>
                                                    <td class="right">{{ $item->qty }}</td>
                                                    <td class="right">{{ $item->qty * $item->price }} fc</td>
                                                    <?php $item_total += $item->qty * $item->price; ?>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <p class="mb-0"><span class="text-uppercase font-weight-bold">Total : <?= $item_total ?>
                                    fc</span></p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <script>
        $('#print').on("click", function() {
            $("#myPrintable").printThis({
                debug: false, // show the iframe for debugging
                importCSS: true, // import parent page css
                importStyle: true, // import style tags
                printContainer: true, // print outer container/$.selector
                loadCSS: "", // path to additional css file - use an array [] for multiple
                pageTitle: "", // add title to print page
                removeInline: false, // remove inline styles from print elements
                removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
                printDelay: 333, // variable print delay
                header: null, // prefix to html
                footer: null, // postfix to html
                base: false, // preserve the BASE tag or accept a string for the URL
                formValues: true, // preserve input/form values
                canvas: false, // copy canvas content
                doctypeString: '...', // enter a different doctype for older markup
                removeScripts: false, // remove script tags from print content
                copyTagClasses: false, // copy classes from the html & body tag
                beforePrintEvent: null, // function for printEvent in iframe
                beforePrint: null, // function called before iframe is filled
                afterPrint: null // function called before iframe is removed
            });
        });
    </script>
@endsection
