<?php 
    // Include the database config file 
    include_once '../db/connect.php'; 
     
    // Fetch all the Assy data 
    $query = "SELECT * FROM tbl_department  "; 
    $result = $conn->query($query);  
?>

 <div class="modal fade" id="edit_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit IS Information</h5>
                    <button class="close clsbtn" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
             </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="edit-author-frm">
                        <div class="row"> 
                            <input type="hidden" name="id">
                           
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="control_no" class="control-label">Control Number</label>
                                <input type="text" class="form-control input-lg" id="control_no" name="control_no" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" readonly>    
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="model" class="control-label">Model</label>
                                <input type="text" class="form-control input-lg" id="model1" name="model" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" readonly>    
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="item_code" class="control-label">Item Code</label>
                                <input type="text" class="form-control input-lg" id="item_code" name="item_code" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" readonly>    
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="letter_code" class="control-label">Letter Code</label>
                                <input type="text" class="form-control input-lg" id="letter_code" name="letter_code" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" readonly>    
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="remarks" class="control-label">Remarks</label>
                                <input type="text" class="form-control input-lg" id="remarks" name="remarks" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" readonly>    
                            </div>
                           
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="requestor" class="control-label">Requestor</label>
                                <input type="text" class="form-control input-lg" id="requestor" name="requestor" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" readonly>    
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="qty" class="control-label">Quanity</label>
                                <input type="text" class="form-control input-lg" id="qty" name="qty" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" readonly>    
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="is_number" class="control-label">IS Number</label><span style='color:red'>*</span>
                                <input type="text" class="form-control input-lg" id="is_number" name="is_number" placeholder='Enter IS Number Here' onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" required>    

                            </div>
                           
                           
                           
                            
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="edit-author-frm">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> </div> </div> </div>
    <!-- /Edit Modal -->