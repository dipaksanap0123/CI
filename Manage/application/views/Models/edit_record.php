<style type="text/css">
  @media (min-width: 768px) {
    #model_dialog_edit{
      width:900px;
    }
  }
  .compulsory{
      color:red;
      font-size:18px;
    }

  .row{
      margin: 10px;
      padding:0;
   }

   *{
    font-weight: normal;
   }
</style>
<div class="modal fade" id="edit_record" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" id='model_dialog_edit'>
    <div class="modal-content">
      <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Record</h4>
        </div>
      <div class="modal-body">
          <form method='post' action='<?php echo base_url(); ?>books/edit_record_with_upload' id='edit_record_form' enctype=multipart/form-data>
            <div class='row'>
              <div class='col-sm-2'>
                <label>Name <span class='compulsory'>*</span></label>
              </div>
               <div class='col-sm-2'>
                <input type="text" class='form-control' name='book_id_edit_record' placeholder="" id='book_id_edit_record' readonly="readonly">
              </div>
              <div class='col-sm-6'>
                <input type="text" class='form-control' name='book_title_edit_record' placeholder="" id='book_title_edit_record'>
              </div>
            </div>

            <div class='row'>
              <div class='col-sm-2'>
                <label>Author <span class='compulsory'>*</span></label>
              </div>
              <div class='col-sm-8'>
                <input type="text" class='form-control' name='book_author_edit_record' placeholder="Enter Author Name" id='book_author_edit_record'>
              </div>
            </div>

            <div class='row'>
              <div class='col-sm-2'>
                <label>Language <span class='compulsory'>*</span></label>
              </div>

              <div class='col-sm-8'>
                <select class='form-control' name='language_edit_record'>
                  <option disabled>Select Language </option>
                  <?php for($i=0;$i<count($catagory['language']);$i++){ ?>
                  <option><?php echo $catagory['language'][$i]['type']; ?></option>
                  <?php }?>
                </select><?php echo form_error('language', '<div class="error">', '</div>'); ?>
              </div>
            </div>

            <div class='row'>
              <div class='col-sm-2'>
                <label>Catagory <span class='compulsory'>*</span></label>
              </div>
              <div class='col-sm-4'>
                <select class='form-control' name='book_catagory_edit_record'>
                  <option disabled>Select Catagory</option>
                  <?php for($i=0;$i<count($catagory['catagory']);$i++){ ?>
                  <option><?php echo $catagory['catagory'][$i]['type']; ?></option>
                  <?php }?>
                </select><?php echo form_error('book_catagory', '<div class="error">', '</div>'); ?>
              </div>

              <div class='col-sm-4'>
                <select class="form-control" id="" name='book_priority_edit_record'>
                  <option disabled>Select Priority</option>
                  <?php for($i=0;$i<count($catagory['priority']);$i++){ ?>
                  <option><?php echo $catagory['priority'][$i]['type']; ?></option>
                  <?php }?>
                </select><?php echo form_error('book_priority', '<div class="error">', '</div>'); ?>
              </div>
              </div>
                
            <div class='row'>
              <div class='col-sm-2'>
                <label>Ratings</label>
              </div>
              <div class='col-sm-4'>
                <select class="form-control" id="ratings_edit_record" name='rating_edit_record'>
                <option disabled>Select Ratings</option>
                <?php for($i=0;$i<count($catagory['ratings']);$i++){ ?>
                <option><?php echo $catagory['ratings'][$i]['type']; ?></option>
                <?php }?>
                </select> 
              </div>

              <div class='col-sm-4'>
                <input type="number" class='form-control' name='price_edit_record' placeholder="Enter Price in ₹">
              </div>
            </div>

            <!--<div class='row'>
              <div class='col-sm-2'>
                <label>Price in ₹</label>
              </div>
              <div class='col-sm-4'>
                <input type="number" class='form-control' name="">
              </div>
            </div>-->


            <div class='row' style="margin-top:20px;">
              <div class='col-sm-2'>
                <label>Cover Image</label>
              </div>
              <div class='col-sm-4'>
                <div class="upload-btn-wrapper">
                 <button class="btn btn-block btn-default"><i class="fa fa-upload"></i> Upload a file</button>
                 <input type="file" name="book_cover_edit_record" /><?php if(isset($error)){echo $error; }?>
              </div>
              </div>

              <div class='col-sm-4'>
                <div class="upload-btn-wrapper">
                 <button class="btn btn-block btn-primary" id='edit_record_btn'>Update Record</button>
              </div>
              </div>
            </div>


          </form>
      </div>
      
    </div>
  </div>
</div>