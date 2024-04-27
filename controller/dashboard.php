<?php  
include('../db/connect.php');
$query_table=mysqli_query($conn, "SELECT 
                            control_no,
                            tbl_request.id,
                            date_requested,
                            division,
                            section,
                            supplier,
                            tbl_model.model,
                            item_code,
                            letter_code,
                            remarks,
                            requestor,
                            tbl_description.description,
                            tbl_location.location,
                            qty

                            FROM
                            tbl_request
                            inner join tbl_model on tbl_request.model_id=tbl_model.model_id
                            inner join tbl_description on tbl_request.defect_description=tbl_description.id
                            inner join tbl_location on tbl_request.defect_location=tbl_location.id
                            where request_status='1'
                            group by control_no order by id asc");
?>