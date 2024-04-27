
 <div class="modal fade" id="add_model" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Defect Description</h5>
                    <button class="close clsbtn" type="button"  data-bs-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true" class='clsbtn'>×</span></button>
                    
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="new_model"   enctype="multipart/form-data">
                            <div class="row">
                             <div class="col-md-12" id="msg1"></div>

                           
                            <div class="form-group col-12 col-md-12  col-sm-12">
                                <label for="description" class="control-label">Defect Description</label><span style="color:red">*</span>
                                <input type="text" class="form-control input-lg" id="description" name="description" placeholder="Enter Defect Description Here" onkeyup="this.value = this.value.toUpperCase()"   required autocomplete="off"> 
                                
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
           