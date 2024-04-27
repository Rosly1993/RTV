

<div class="modal fade" id="edit<?php echo $_GET['control_no']; ?>" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Model Info</h5>
                    <button class="close clsbtn" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
             </button>
                </div>
               
                <div class="modal-body">
                    <div class="container-fluid">
                        <form  method='post' action="../controller/update_model.php">
                        <div class="row"> 
                            <input type="hidden" name="model_id" value="<?php echo $_GET['control_no']; ?>">
                           
                            <div class="form-group col-12 col-md-12  col-sm-12">
                                <label for="model" class="control-label">Model Name</label>
                                <input type="text" class="form-control input-lg" id="model" name="model" value="" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" >    
                            </div>
                           
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> </div> </div> </div>
    <!-- /Edit Modal -->    </form>