@extends("layouts.app")
@section("content")
    
<div class="wrapper">
    <div class="offset-xl-2 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 padding mt-4">
        <div class="card">
            <div class="card-header p-4">
                <a class="pt-2 d-inline-block" href="index.html" data-abc="true">The king</a>
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
                           
                            <tr>

                                <td class="left strong text-uppercase"></td>
                                <td class="right"></td>
                                <td class="right"> fc</td>
                               
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p class="mb-0"><span class="text-uppercase font-weight-bold">Total : fc</span></p>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script>
    $('#basic').on("click", function() {
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