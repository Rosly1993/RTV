
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php 
    include_once '../db/connect.php'; 
    $query = "SELECT * FROM tbl_model "; $result = $conn->query($query);  
    $query1 = "SELECT * FROM tbl_location  order by location ASC"; $result1 = $conn->query($query1);  
    $query2 = "SELECT * FROM tbl_description order by description ASC "; $result2 = $conn->query($query2);  
    
    
    
    $name= ($_SESSION['name']);
?>
 <div class="modal fade" id="add_model" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Return to Diecast Transaction Report</h5>
                    <button class="close clsbtn" type="button"  data-bs-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true" class='clsbtn'>×</span></button>
                    
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="new_model"   enctype="multipart/form-data">
                            <div class="row">
                             <div class="col-md-12" id="msg1"></div>

                            <div class="form-group col-4 col-md-4  col-sm-4">
                                <label for="division" class="control-label">Division</label><span style="color:red">*</span>
                                <input type="text" class="form-control input-lg" id="division" name="division" placeholder="Enter Model Name Here" value='MACHINING' onkeyup="this.value = this.value.toUpperCase()" readonly> 
                                
                            </div>
                            <div class="form-group col-4 col-md-4  col-sm-4">
                                <label for="section" class="control-label">Section</label><span style="color:red">*</span>
                                <input type="text" class="form-control input-lg" id="section" name="section" placeholder="Enter Model Name Here" value='RTS' onkeyup="this.value = this.value.toUpperCase()" readonly> 
                                
                            </div> 
                            <div class="form-group col-4 col-md-4  col-sm-4">
                                <label for="supplier" class="control-label">Supplier</label><span style="color:red">*</span>
                                <input type="text" class="form-control input-lg" id="supplier" name="supplier" placeholder="Enter Model Name Here" value='DIECAST' onkeyup="this.value = this.value.toUpperCase()" readonly> 
                                
                            </div>  
                            <div class="form-group col-4 col-md-4  col-sm-4" id='myModal'>
                                <label for="model" class="control-label">Model Name</label><span style="color:red">*</span>
                                <select type="text" class="form-control input-lg" id="country" name="model_id" placeholder="Enter Last Name Here" required autocomplete="off"> 
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
                            
                            <div class="form-group col-4 col-md-4  col-sm-4">
                                <label for="item_code" class="control-label">Item Code</label><span style="color:red">*</span>
                                <select type="number" class="form-control input-lg" id="state" name="item_code" placeholder="Enter Model Name Here" min='0' required autocomplete="off"> 
                                <option value="">Select Model First</option>
                            </select>
                            </div> 
                            <div class="form-group col-4 col-md-4  col-sm-4">
                                <label for="remarks" class="control-label">Remarks</label><span style="color:red">*</span>
                                <input type="text" class="form-control input-lg" id="remarks" name="remarks" placeholder="Enter Remarks Here"  required autocomplete="off" required> 
                               
                            </div>
                            <div class="form-group col-4 col-md-4  col-sm-4">
                                <label for="defect_description" class="control-label">Defect</label><span style="color:red">*</span>
                                <select type="text" class="form-control input-lg" style="width:100%;" id="defect_description" name="defect_description[]" placeholder="Enter Last Name Here" required autocomplete="off"> 
                                <option value=''>Select Defect </option>
                                <?php 
                                    if($result2->num_rows > 0){ 
                                        while($row2 = $result2->fetch_assoc()){  
                                            echo '<option value="'.$row2['id'].'">'.$row2['description'].'</option>'; 
                                        } 
                                    }else{ 
                                        echo '<option value="">Model not available</option>'; 
                                    } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-4 col-md-4  col-sm-4">
                                <label for="defect_location" class="control-label"> Location</label><span style="color:red">*</span>
                                <!-- <select type="text" class="js-example-responsive" style="width:100%; height:100px" id="defect_location" name="defect_location" placeholder="Enter Last Name Here" required autocomplete="off">  -->
                                <select type="text" class="form-control input-lg" style="width:100%;" id="defect_location" name="defect_location[]" placeholder="Enter Last Name Here" required autocomplete="off"> 
                                <option value=''>Select  Location</option>
                                <?php 
                                    if($result1->num_rows > 0){ 
                                        while($row1 = $result1->fetch_assoc()){  
                                            echo '<option value="'.$row1['id'].'">'.$row1['location'].'</option>'; 
                                        } 
                                    }else{ 
                                        echo '<option value="">Model not available</option>'; 
                                    } 
                                    ?>
                                </select>
                            </div>
                           
                            <div class="form-group col-2 col-md-2  col-sm-2">
                                <label for="qty" class="control-label">NG Quantity</label>
                                <input type="number"style="width:100%;" min="1" class="form-control input-lg" id="qty" name="qty[]"  onchange="sumInputs()" placeholder="Enter NG Qty. Here" onkeyup="this.value = this.value.toUpperCase()" required autocomplete="off"> 
                                
                            </div> 
                            <div class="form-group col-2 col-md-2  col-sm-2">
                            <label for="qty" class="control-label"><a href="javascript:sumInputs()">Total QTY.</a></label>
                                
		<input class="form-control input-lg" type="text" name="total" id="total" readonly=""/>
                                
                            </div> 
                          
                            <table>
                               
                               <tbody id="tbody">
   
                               <div class="form-group col-4 col-md-4 col-sm-4"></div>
   
                               </table>
                               <input type="hidden" class="form-control input-lg" id="requestor" name="requestor" placeholder="Enter Model Name Here" value='<?php echo $name; ?>' onkeyup="this.value = this.value.toUpperCase()" readonly> 
                           
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                <tbody id="tbody">
                    <button type="button" class="btn bg-gradient-info" form="new-author-frm" onClick="addItem();" >Add Item</button>
                    <button type="submit" class="btn bg-gradient-success" form="new_model">Save</button>
                    <button type="button"  class="btn bg-gradient-danger " data-bs-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>
                </div>
    
<!-- /Add Modal (Mold)--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <script>
            $(document).ready(function(){
                $('#country').on('change', function(){
                    var countryID = $(this).val();
                    if(countryID){
                        $.ajax({
                            type:'POST',
                            url:'ajax.php',
                            data:'model_id='+countryID,
                            success:function(html){
                                $('#state').html(html);
                                $('#city').html('<option value="">Select Process first</option>'); 
                            }
                        }); 
                    }else{
                        $('#state').html('<option value="">Select model first</option>');
                        $('#city').html('<option value="">Select Process first</option>'); 
                    }
                });
                
                $('#state').on('change', function(){
                    var stateID = $(this).val();
                    if(stateID){
                        $.ajax({
                            type:'POST',
                            url:'ajax.php',
                            data:'model_id='+stateID,
                            success:function(html){
                                $('#city').html(html);
                            }
                        }); 
                    }else{
                        $('#city').html('<option value="">Select Process first</option>'); 
                    }
                });
            });
            </script>



            <script>
            
            var items = 1;
            function addItem() {
                items++;
                $('#total_item').val(items);
                var html = "<class='container-fluid'>";
                html += "<div class='row' id='myModal1'>";
                            
                html +='<div class="form-group col-4 col-md-4 col-sm-4">';
                
                html +='<select type="text" class="form-control input-lg" style="width:100%;" id="defect_description" name="defect_description[]" required><option value="">Select Defect </option><?php 
                include_once '../db/connect.php'; 
                $query = "SELECT * FROM tbl_description  order by description ASC "; 
                $result2 = $conn->query($query);  
                ?><?php  if($result2->num_rows > 0){ while($row = $result2->fetch_assoc()){  echo '<option value="'.$row['id'].'">'.$row['description'].'</option>'; } } ?> </select>';
                html +='</div>';

                html +='<div class="form-group col-4 col-md-4 col-sm-4">';
                
                html +='<select type="text" class="form-control input-lg" style="width:100%;" id="defect_location" name="defect_location[]" required><option value="">Select  Location</option><?php 
                include_once '../db/connect.php'; 
                $query = "SELECT * FROM tbl_location order by location ASC "; 
                $result1 = $conn->query($query);  
                ?><?php  if($result1->num_rows > 0){ while($row = $result1->fetch_assoc()){  echo '<option value="'.$row['id'].'">'.$row['location'].'</option>'; } } ?> </select>';
                html +='</div>';

               

                html +='<div class="form-group col-2 col-md-2 col-sm-2">';
                
                html +='<input class="form-control input-lg" type="number" min="1"  name="qty[]"  onchange="sumInputs()" placeholder="Enter Qty. Here" required="" autocomplete="off">';
                html +='</div>';
                
                html +='<div class="form-group col-2 col-md-2 col-sm-2">';
                
                html +="<button type='button' style='width:93px' onClick='deleteRow(this);'  class='btn bg-gradient-secondary' ><i class='ni ni-settings'></i></button>";
                
                html +='</div>';
               
                html += "</div>";
                html += "</div>";
                    //<input type='text' name='model[]' style='text-transform:uppercase'>
                var row = document.getElementById("tbody").insertRow();
                row.innerHTML = html;
            
                    }
            
                    function deleteRow(btn) {
                    var row = btn.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                    };
                    $(document).ready(function(){
            
            // Initialize select2
            // $('.js-example-responsive1').select2();
		

            // Read selected option
            
        });</script>


 <script>
                  
 function sumInputs() {
    var inputs = document.querySelectorAll('input[type=number]'),
        result = document.getElementById('total'),
        sum = 0;            

    for(var i=0; i<inputs.length; i++) {
        var ip = inputs[i];

        if (ip.name && ip.name.indexOf("total") < 0) {
            sum += parseInt(ip.value) || 0;
        }

    }

    result.value = sum;
}

 </script>

       