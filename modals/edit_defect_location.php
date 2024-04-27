
 <div class="modal fade" id="edit_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Location Defect</h5>
                    <button class="close clsbtn" type="button" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
             </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="edit-author-frm">
                        <div class="row"> 
                            <input type="hidden" name="id">
                           
                            <div class="form-group col-12 col-md-12  col-sm-12">
                                <label for="location" class="control-label">Location Defect</label>
                                <input type="text" class="form-control input-lg" id="location1" name="location" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" >    
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