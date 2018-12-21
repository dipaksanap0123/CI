<div class="modal fade" id="delete_record" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Record</h4>
        </div>
      <div class="modal-body">
       Are you Sure want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
        <!--<a class='btn btn-danger' href='<?php echo base_url();?>Books/delete_Book/<?php echo $all_books[$i]['id']?>'>Yes</a>-->
         <a class='btn btn-danger btn-sm' id='onn'>Yes, Delete</a>
      </div>
    </div>
  </div>
</div>