<!-- Modal -->

<form action='' method='POST'>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-group col-12 col-md-12  col-sm-12">
       <label for="letter_code" class="control-label">Remarks</label><span style="color:red">*</span>
      <input type="text" class="form-control input-lg" id="remarks" name="remarks" placeholder="Enter Remarks Here" onkeyup="this.value = this.value.toUpperCase()"  required autocomplete="off"> 
                                
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value='Reject' name="REJECT">Save changes</button>
      </div>
    </div>
  </div>
</div></form>