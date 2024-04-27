
$(document).ready(function() {
    $("#js-example-theme-single").select2({
        theme: "classic"
      });
      $("#js-example-theme-single1").select2({
        theme: "classic"
      });
    
  });
  $(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
  });
  
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
  
    $(document).ready(function(){
            
            // Initialize select2
            
      $('#myTable').DataTable( 
        {
          columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0,
                
            },
        ],
        order: [[1, 'asc']],
        dom: 'Blfrtip',
        "pageLength": 15,
        "responsive": true,
        // "processing": true,
        // "serverSide": true,
  
        lengthMenu: [
            [15, 20, 25, 50 ,100,  -1],
            [15, 20, 25, 50 ,100,  "All"],
        ],
    buttons: [
             {
                        extend: 'excelHtml5',
                        text:'<a class="text-white excelbtn"><i class="fa fa-file-excel  text-white"></i>&nbsp;&nbsp;Excel Download</a>',
                        className: "buttontest",
                        autoFilter: true,
                        sheetName: 'Exported data',
                        exportOptions: {
                            columns: ':visible'
                        },  title: 'RTS',
                    },
                    {
                        extend: 'print',
                        text:'<a class="text-white pdfbtn"><i class="fa fa-file-pdf text-white"></i>&nbsp;&nbsp;PDF Download</a>',
                        className: "buttontest",
                        autoFilter: true,
                        orientation: 'landscape',
                        sheetName: 'Exported data',
                        exportOptions: {
                            columns: ':visible'
                        },  title: 'RTS', 
                    },
                    //  {
                    //     extend: 'colvis',
                    //     text:'<a class="text-white pdfbtn"><i class="fa fa-minus-square text-white"></i>&nbsp;&nbsp;Hide Fields</a>',
                    //     className: "buttontest",
                    //     autoFilter: true,
                    //     orientation: 'landscape',
                    //     sheetName: 'Exported data',
                    //     exportOptions: {
                    //         columns: ':visible'
                    //     },  title: 'RTS', 
                    // },
       
    //   'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
  
        // converting to interger to find total
        var intVal = function ( i ) {
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };
  
        // computing column Total of the complete result 
  //       var monTotal = api
  //           .column( 1 )
  //           .data()
  //           .reduce( function (a, b) {
  //               return intVal(a) + intVal(b);
  //           }, 0 );
    
  // var tueTotal = api
  //           .column( 2 )
  //           .data()
  //           .reduce( function (a, b) {
  //               return intVal(a) + intVal(b);
  //           }, 0 );
    
  //       var wedTotal = api
  //           .column( 3 )
  //           .data()
  //           .reduce( function (a, b) {
  //               return intVal(a) + intVal(b);
  //           }, 0 );
    
  //  var thuTotal = api
  //           .column( 4 )
  //           .data()
  //           .reduce( function (a, b) {
  //               return intVal(a) + intVal(b);
  //           }, 0 );
    
   var friTotal = api
            .column( 7 )
            .data()
            .reduce( function (a, b) {
                return Number(intVal(a) + intVal(b)).toFixed(0);
            }, 0 );
  
    
        // Update footer by showing the total with the reference of the column index 
  $( api.column( 0 ).footer() ).html('Quantity');
        // $( api.column( 1 ).footer() ).html(monTotal);
        // $( api.column( 2 ).footer() ).html(tueTotal);
        // $( api.column( 3 ).footer() ).html(wedTotal);
        // $( api.column( 4 ).footer() ).html(thuTotal);
        $( api.column( 7 ).footer() ).html(friTotal);
          }
    }); 
  
    
  
    t.on('order.dt search.dt', function () {
        let i = 1;
  
        t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
  
  
    } 
      );
            // Read selected option
            
    
            // Broadcast that you're opening a page.
            localStorage.openpages = Date.now();
            var onLocalStorageEvent = function(e){
                if(e.key == "openpages"){
                    // Listen if anybody else is opening the same page!
                    localStorage.page_available = Date.now();
                }
                if(e.key == "page_available"){
                    //alert("One more page already open");
                    window.location.href = 'not_allowed';
                }
            };
            window.addEventListener('storage', onLocalStorageEvent, false);
