<?php 
    include_once '../db/connect.php'; 
    $query = "SELECT * FROM tbl_model "; 
    $result = $conn->query($query);   
?>
 <div class="modal fade" id="add_model" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Item Code</h5>
                    <button class="close clsbtn" type="button"  data-bs-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true" class='clsbtn'>×</span></button>
                    
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="new_model"   enctype="multipart/form-data">
                            <div class="row">
                             <div class="col-md-12" id="msg1"></div>

                             <div class="form-group col-12 col-md-12  col-sm-12">
                                <label for="model" class="control-label">Model Name</label><span style="color:red">*</span>
                                <select type="text" class="form-control input-lg" id="model" name="model_id" placeholder="Enter Model Name Here" onkeyup="this.value = this.value.toUpperCase()" required autocomplete="off"> 
                                <option value=''>Select Model Name</option>
                                <?php 
                                    if($result->num_rows > 0){ 
                                        while($row = $result->fetch_assoc()){  
                                            echo '<option value="'.$row['model_id'].'">'.$row['model'].'</option>'; 
                                        } 
                                    }else{ 
                                        echo '<option value="">Model not available</option>'; 
                                    } 
                                    ?>
                                </select>
                            </div> 
                            <div class="form-group col-12 col-md-12  col-sm-12">
                                <label for="item_code" class="control-label">Letter Code</label><span style="color:red">*</span>
                                <select type="text" class="form-control input-lg" id="item_code" name="item_code" placeholder="Enter Model Name Here" onkeyup="this.value = this.value.toUpperCase()" required autocomplete="off"> 
                                <option value=''>Select Item Code</option>
                                <option value='BASN'>BASN</option>
                                <option value='BASL'>BASL</option>
                                <option value='BASP'>BASP</option>
                                <option value='PIN'>PIN</option>
                                <option value='PIN1'>PIN1</option>
                                <option value='PIN7'>PIN7</option>
                                <option value='HOS'>HOS</option>
                              
                                </select>
                            </div>  
                            <div class="form-group col-12 col-md-12  col-sm-12">
                                <label for="letter_code" class="control-label">Item Code</label><span style="color:red">*</span>
                                <input type="text" class="form-control input-lg" id="letter_code" name="letter_code" placeholder="Enter Letter Code Here" onkeyup="this.value = this.value.toUpperCase()" min='0' required autocomplete="off"> 
                                
                            </div>  
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="new_model">Save</button>
                    <button type="button"  class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>
                </div>
    
<!-- /Add Modal (Mold)--> 
