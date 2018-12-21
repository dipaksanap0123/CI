<!DOCTYPE html>
<html>
	<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
			.compulsory{
				color:red;
				font-size:18px;
			}

			.row{
				margin: 10px;
			}
			.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  width:100%;
}

.btn {
  border: 2px solid gray;
  background-color: white;
  border-radius: 8px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
		</style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		</head>
		<body>
			<div class='container' style="border:3px solid #ddd;border-radius:4px;padding:20px;">
				<div class='well well-sm text-center'><h3>Add Record<h3></div>
				<hr>
				<div class='well'>
					<!--------------------------------------------------------------------------->	
					<form method='post' action='<?php echo base_url(); ?>Books/add_record_with_upload' id='add_record_form' enctype=multipart/form-data>
						<div class='row'>
							<div class='col-sm-2'>
								<label>Name <span class='compulsory'>*</span></label>
							</div>
							<div class='col-sm-8'>
								<input type="text" class='form-control' name='book_title' placeholder="Enter Name of Book"><?php echo form_error('book_title', '<div class="error">', '</div>'); ?>
							</div>
						</div>

						<div class='row'>
							<div class='col-sm-2'>
								<label>Author <span class='compulsory'>*</span></label>
							</div>
							<div class='col-sm-8'>
								<input type="text" class='form-control' name='book_author' placeholder="Enter Author Name"><?php echo form_error('book_author', '<div class="error">', '</div>'); ?>
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
								</select><?php echo form_error('language', '<div class="error">', '</div>'); ?>
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
								</select><?php echo form_error('book_catagory', '<div class="error">', '</div>'); ?>
							</div>

							<div class='col-sm-4'>
								<select class="form-control" id="" name='book_priority'>
									<option disabled>Select Priority</option>
									<?php for($i=0;$i<count($catagory['priority']);$i++){ ?>
									<option><?php echo $catagory['priority'][$i]['type']; ?></option>
									<?php }?>
								</select><?php echo form_error('book_priority', '<div class="error">', '</div>'); ?>
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
					
					<!--------------------------------------------------------------------------->
				</div>				
			</div>
		</body>
	</html>
</html>