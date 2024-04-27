
 <div class="modal fade" id="add_model" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button class="close clsbtn" type="button"  data-bs-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true" class='clsbtn'>×</span></button>
                    
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form onsubmit="return validateForm()" action="" id="new_model"   enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12" id="msg1"></div>

                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="name" class="control-label">Full Name</label><span style="color:red">*</span>
                                <input type="text" class="form-control input-lg" id="name" name="name" placeholder="Enter First Name Here" required autocomplete="off"> 
                            </div> 
                            <div class="form-group col-6 col-md-6 col-sm-6">
                                <label for="user_name" class="control-label">User Name</label><span style="color:red">*</span>
                                <input type="text" class="form-control input-lg" id="user_name" name="user_name" placeholder="Enter User Name Here" required autocomplete="off">
                            </div>
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="area" class="control-label">Area</label><span style="color:red">*</span>
                                <select type="text" class="form-control input-lg" id="area" name="area" placeholder="Enter Last Name Here" required autocomplete="off"> 
                                <option value=''>Select Area</option>
                                <option value='Prod-EFI'>Prod-EFI</option>
                                <option value='Prod-MFI'>Prod-MFI</option>
                                <option value='MED-Casting'>MED-Casting</option>
                                <option value='MED-MFI'>MED-MFI</option>
                                <option value='Prod-Manager'>Prod-Manager</option>
                                <option value='Warehouse'>Warehouse</option>

                                </select>
                            </div> 
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="user_role" class="control-label">User Role</label><span style="color:red">*</span>
                                <select type="text" class="form-control input-lg" id="user_role" name="user_role"  required autocomplete="off">
                                <option value="">Select Role</option>
                                <option value='Requestor'>Requestor</option>
                                <option value='Reviewer'>Reviewer</option>
                                <option value='Approver'>Approver</option>
                              
                                </select> 
                            </div> 
                            <div class="form-group col-6 col-md-6  col-sm-6">
                                <label for="email_address" class="control-label">Email Address</label><span style="color:red">*</span>
                                <input type="email" name="email_address" id="email_address" placeholder="Enter Email Address Here" class="form-control input-lg" required autocomplete="off"/>
                            </div> 
                            <div class="form-group col-6 col-md-6 col-sm-6">
        <label for="pwd" class="control-label">Password</label><span style="color:red">*</span>
        <input type="password" name="password" id="pwd" class="form-control input-lg" 
            placeholder="Enter Password Here" required autocomplete="off" 
            pattern="(?=.*\d)(?=.*[A-Za-z])[A-Za-z0-9]+" 
            title="Password must contain at least one letter and one number" 
            minlength="5" data-toggle="password" />
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
    

     <script>
    function validateForm() {
        var username = document.getElementById("user_name").value;
        var password = document.getElementById("pwd").value;

        if (username === password) {
            alert("Username and password cannot be the same. Please choose different ones.");
            return false; // Prevents form submission
        }

        return true; // Allows form submission
    }
</script>