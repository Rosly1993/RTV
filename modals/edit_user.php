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
                    <h5 class="modal-title">Edit User Info</h5>
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
                                <label for="name" class="control-label">Full Name</label>
                                <input type="text" class="form-control input-lg" id="name" name="name" autocomplete="off" >
                               
                            </div> 
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="user_name" class="control-label">User Name</label>
                                <input type="text" class="form-control input-lg" id="user_name" name="user_name" autocomplete="off" >
                               
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="email_address" class="control-label">Email Address</label>
                                <input type="text" class="form-control input-lg" id="email_address" name="email_address" autocomplete="off" >
                               
                            </div>
                            <div class="form-group col-6 col-md-6 col-sm-6">
        <label for="pwd" class="control-label">Password</label><span style="color:red">*</span>
        <input type="password" name="password" id="pwd" class="form-control input-lg" 
            placeholder="Enter Password Here" required autocomplete="off" 
            pattern="(?=.*\d)(?=.*[A-Za-z])[A-Za-z0-9]+" 
            title="Password must contain at least one letter and one number" 
            minlength="5" data-toggle="password" />
    </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="area" class="control-label">Area</label>
                                <select  class="form-control input-lg" id="area1" name="area" autocomplete="off"> 
                                <option value="">Select Area</option>
                                <option value='Prod-EFI'>Prod-EFI</option>
                                <option value='Prod-MFI'>Prod-MFI</option>
                                <option value='MED-Casting'>MED-Casting</option>
                                <option value='MED-MFI'>MED-MFI</option>
                                <option value='Prod-Manager'>Prod-Manager</option>
                                <option value='Warehouse'>Warehouse</option>

                                </select>
                               
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="user_role" class="control-label">User Role</label>
                                <select  class="form-control input-lg" id="user_role1" name="user_role" autocomplete="off">
                                <option value="">Select Role</option>
                                <option value='Requestor'>Requestor</option>
                                <option value='Reviewer'>Reviewer</option>
                                <option value='Approver'>Approver</option>
                                </select>
                               
                            </div>
                           
                            <div class="form-group col-12 col-md-12  col-sm-12">
                                <label for="is_active" class="control-label">Status</label>
                                <select class="form-control input-lg" id="is_active1" name="is_active" >
                                <option value='1'>Active</option>
                                <option value='0'>Inactive</option>
                                </select>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="edit-author-frm">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> </div> </div> </div>
    <!-- /Edit Modal -->