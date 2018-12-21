<style type="text/css">
.compulsory{
	color:red;
	font-size:18px;
}

.row{
	margin: 10px;
}
.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>

<style type="text/css">
  .compulsory{
      color:red;
      font-size:18px;
    }

  .row{
      margin: 10px;
   }

   *{
    font-weight: normal;
   }
</style>
<div class="modal fade" id="add_record" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" id='model_dialog_edit'>
    <div class="modal-content">
      <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Record</h4>
        </div>
      <div class="modal-body">
         <form method='post' action='<?php echo base_url(); ?>books/add_record_with_upload' id='add_record_form' enctype=multipart/form-data>
            <div class='row'>
              <div class='col-sm-2'>
                <label>Name <span class='compulsory'>*</span></label>
              </div>
              <div class='col-sm-8'>
                <input type="text" class='form-control' name='book_title' placeholder="Enter Name of Book">
              </div>
            </div>

            <div class='row'>
              <div class='col-sm-2'>
                <label>Author <span class='compulsory'>*</span></label>
              </div>
              <div class='col-sm-8'>
                <input type="text" class='form-control' name='book_author' placeholder="Enter Author Name">
              </div>
            </div>

            <div class='row'>
              <div class='col-sm-2'>
                <label>Language <span class='compulsory'>*</span></label>
              </div>

              <div class='col-sm-8'>
                <select class='form-control' name='language'>
                  <option disabled>Select Language </option>
                  <?php for($i=0;$i<count($catagory['language']);$i++){ ?>
                  <option><?php echo $catagory['language'][$i]['type']; ?></option>
                  <?php }?>
                </select>
              </div>
            </div>

            <div class='row'>
              <div class='col-sm-2'>
                <label>Catagory <span class='compulsory'>*</span></label>
              </div>
              <div class='col-sm-4'>
                <select class='form-control' name='book_catagory'>
                  <option disabled>Select Catagory</option>
                  <?php for($i=0;$i<count($catagory['catagory']);$i++){ ?>
                  <option><?php echo $catagory['catagory'][$i]['type']; ?></option>
                  <?php }?>
                </select>
              </div>

              <div class='col-sm-4'>
                <select class="form-control" id="" name='book_priority'>
                  <option disabled>Select Priority</option>
                  <?php for($i=0;$i<count($catagory['priority']);$i++){ ?>
                  <option><?php echo $catagory['priority'][$i]['type']; ?></option>
                  <?php }?>
                </select>
              </div>
              </div>

            <!--<div class='row'>
              <div class='col-sm-2'>
                <label>Priority</label>
              </div>
              <div class='col-sm-4'>
                <select class="form-control" id="" name='priority'>
                  <option >Select Priority</option>
                  <?php for($i=0;$i<count($catagory['priority']);$i++){ ?>
                  <option><?php echo $catagory['priority'][$i]['type']; ?></option>
                  <?php }?>
                </select>
              </div>
            </div>-->
                
            <div class='row'>
              <div class='col-sm-2'>
                <label>Ratings</label>
              </div>
              <div class='col-sm-4'>
                <select class="form-control" id="ratings_add_record" name='rating'>
                <option disabled>Select Ratings</option>
                <?php for($i=0;$i<count($catagory['ratings']);$i++){ ?>
                <option><?php echo $catagory['ratings'][$i]['type']; ?></option>
                <?php }?>
                </select> 
              </div>

              <div class='col-sm-4'>
                <input type="number" class='form-control' name='price' placeholder="Enter Price in ₹">
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
                 <button class="btn btn-block"><i class="fa fa-upload"></i> Upload a file</button>
                 <input type="file" name="book_cover" /><?php if(isset($error)){echo $error; }?>
              </div>
              </div>

              <div class='col-sm-4'>
                <div class="upload-btn-wrapper">
                 <button class="btn btn-block" id='add_record_btn'>Add Record</button>
              </div>
              </div>
            </div>


          </form>
      </div>
      
    </div>
  </div>
</div>