
var authorsTbl = '';
$(function() {
    // draw function [called if the database updates]
    function draw_data() {
        if ($.fn.dataTable.isDataTable('#authors-tbl') && authorsTbl != '') {
            authorsTbl.draw(true)
        } else {
            load_data();
        }
    }

    function load_data() {
        authorsTbl = $('#authors-tbl').DataTable({
            dom: '<"row"B>flr<"py-2 my-2"t>ip',
            "processing": true,
            "searching": false,
            "serverSide": true,
            "responsive": true,
            lengthMenu: [
                [10, 25, 50 ,100,  -1],
                [10, 25, 50 ,100,  "All"],
            ],
            
            
            "pageLength": 10,
            "ajax": {
                url: "../controller/get_pages.php",
                method: 'POST'
            },
            columns: [
                
              
            {
                data: 'page_name',
                className: 'py-0 px-1 text-center'
            },
            
            {
                data: 'date_update',
                className: 'py-0 px-1 text-center'
            },
            {
                data: 'updated_by',
                className: 'py-0 px-1 text-center'
            },
                
                {
                    data: 'is_active',
                    className: 'py-0 px-1 text-center', 
                    render(data,type,row){

                   

                        if(data > 0){
                           return '<div class="badge badge-sm bg-gradient-success">Active</div>';
                          
                        }else{
                            return '<div class="badge badge-sm bg-gradient-warning"">Inactive</div>';
                            }
                       
                }
                },
                {
                    data: 'id',
                    orderable: false,
                    className: 'text-center py-0 px-1',
                    render: function(data, type, row, meta) {
                        console.log()
                     
                      
                            return '<a class="me-2  btn-sm rounded-0 py-0 edit_data" href="javascript:void(0)" data-id="' + (row.id) + '"><i class="ni ni-settings"></i></a>';
                        
                       

                }
            },
              
               
               
            ],
            drawCallback: function(settings) {
                $('.edit_data').click(function() {
                    $.ajax({
                        url: '../controller/get_single_page.php',
                        data: { id: $(this).attr('data-id') },
                        method: 'POST',
                        dataType: 'json',
                        error: err => {
                            alert("An error occured while fetching single data")
                        },
                        success: function(resp) {
                            if (!!resp.status) {
                                Object.keys(resp.data).map(k => {
                                    if ($('#edit_modal').find('input[name="' + k + '"]').length > 0)
                                        $('#edit_modal').find('input[name="' + k + '"]').val(resp.data[k])
                                })
                               
                              
                                var is_active = resp.data.is_active;
                                var page_name = resp.data.page_name;
                              

                                 $("#is_active1").val( is_active );
                                 $("#page_name1").val( page_name );

                                if(is_active =='1'){
                                
                                    $('#is_active1').css('background-color', '#28DF99');
                                    $('#is_active1').css('color', 'white');
                                    // $('#is_active1').addClass("badge badge-sm bg-gradient-success");

                                }else{
                                    $('#is_active1').css('background-color', '#FF5733');
                                    $('#is_active1').css('color', 'white');

                                }
                              
                                 
                                // $("#rtv_quantity").attr('max', quantity ); //to set maximum value input textbox
                                // $('#model').html(statusHtml);
                                $('#edit_modal').modal('show')
                            } else {
                                alert("An error occured while fetching single data")
                            }
                        }
                    })
                })
               },
            buttons: [

                
                
                // {
                
                    // text: '<a class="text-white addbtn"><i class="fas fa-plus text-white "></i>&nbsp; Add Model</a>',
                    // className: "buttontest",
                    // action: function(e, dt, node, config) {
                    //     $('#add_model').modal('show')
                    // },
                
                    // },
                //     {
                //         extend: 'excelHtml5',
                //         text:'<a class="text-white excelbtn"><i class="fa fa-file-excel  text-white"></i>&nbsp;&nbsp;Excel Download</a>',
                //         className: "buttontest",
                //         autoFilter: true,
                //         sheetName: 'Exported data',
                //         exportOptions: {
                //             columns: ':visible'
                //         },  title: 'Warehouse Database',
                //     },
                //     {
                //         extend: 'print',
                //         text:'<a class="text-white pdfbtn"><i class="fa fa-file-pdf text-white"></i>&nbsp;&nbsp;PDF Download</a>',
                //         className: "buttontest",
                //         autoFilter: true,
                //         orientation: 'landscape',
                //         sheetName: 'Exported data',
                //         exportOptions: {
                //             columns: ':visible'
                //         },  title: 'Warehouse Database', 
                //     },
           
        ],
        
            "order": [
                [1, "asc"]
            ],
            initComplete: function(settings) {
                $('.paginate_button').addClass('p-1') 
            }
        });
    }

    load_data()
  
        
     
   
        // Update pages
        $('#edit-author-frm').submit(function(e) {
            e.preventDefault()
            $('#edit_modal button').attr('disabled', true)
            $('#edit_modal button[form="edit-author-frm"]').text("saving ...")
            $.ajax({
                url: '../controller/update_pages.php',
                data: $(this).serialize(),
                method: 'POST',
                dataType: "json",
                error: err => {
                    alert("Error!")
                },
                success: function(resp) {
                    if (!!resp.status) {
                        var _el = $('<div>')
                            _el.hide()
                            _el.removeClass('error')
                            _el.text("");
                            
                        if (resp.status == 'success') {
                            
                            _el.addClass('alert alert-success alert_msg')
                            _el.text(resp.msg);
                            $('#edit-author-frm').get(0).reset()
                            $('.modal').modal('hide')
                            $('#msg').append(_el)
                            _el.show('slow')
                            draw_data();
                            setTimeout(() => {
                                _el.hide('slow')
                                    .remove()
                            }, 2500)
                        } else if (resp.status == 'success' && !!resp.msg) {
                            
                            _el.addClass('alert alert-danger alert_msg')
                            _el.text(resp.msg);
                            $('#edit-author-frm').get(0).reset()
                            $('.modal').modal('hide')
                            $('#msg').append(_el)
                            _el.show('slow')
                            draw_data();
                            setTimeout(() => {
                                _el.hide('slow')
                                    .remove()
                            }, 2500)
                        } else {
                          
                            _el.addClass('alert alert-danger alert_msg')
                            _el.text(resp.msg);
                            $('#edit-author-frm').get(0).reset()
                            $('.modal').modal('hide')
                            $('#msg').append(_el)
                            _el.show('slow')
                            draw_data();
                            setTimeout(() => {
                                _el.hide('slow')
                                    .remove()
                            }, 2500)
                        }
                    } else {
                        alert("Error!")
                    }
                    $('#edit_modal button').attr('disabled', false)
                    $('#edit_modal button[form="edit-author-frm"]').text("Save")
                }
            })
        })
       
});

     