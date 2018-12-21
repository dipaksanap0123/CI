<!DOCTYPE html>
<html>
	<head>
		<style>
			.left{
				height:120px;margin-left:20px;border-radius:4px;
				
			}
			
			.right{
				height:120px;margin-left:15px;border-radius:4px;
				background:#fff;
			}
			
			.book_details_on_page{
				height:100%;
			}
						
			.book_details_on_page li{
				list-style-type:none;
				margin:8px;
				padding:3px;
				font-weight:bold;
				
			}
			
			#fix_nav_top{
				width:50%;
				display:inline;
				z-index:900;
			}
			
			#fix_nav_top h4{
				width:auto;
				background:yellow;
				z-index:900;
			}
			
			
			#distinct_li li{
				list-style-type:none;
				float:left;
			}

			.dropdown-menu {
				/*Main for order*/
				right: 0;
				left:70%;
				z-index: 1;
			}

			#order_dropdown{
				margin-top: -28px;
				margin-bottom: 15px;
			}
		</style>
		<script>
			$(document).ready(function(){
				$('#delete_record').on('show.bs.modal', function(e) {
	    			var bookId = $(e.relatedTarget).data('book-id');
	    			//$(e.currentTarget).find('#onn').text(bookId);
	    			$(e.currentTarget).find('a').attr("href", "<?php base_url();?>Books/delete_Book/"+bookId);
				});

				$('#edit_record').on('show.bs.modal', function(e) {
					var bookId = $(e.relatedTarget).data('book-id');
	    			var book_title = $(e.relatedTarget).data('book-title');
	    			var book_author = $(e.relatedTarget).data('book-author');
	    			$("#book_id_edit_record").val(bookId);
	    			$("#book_title_edit_record").val(book_title);
	    			$("#book_author_edit_record").val(book_author);
				});
			});
		</script>
	</head>
	<body>
	<div class='text-right' id='order_dropdown'>
	<div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Arrange
        <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>Books/subIndex/book_title">Name</a></li>
                <li><a href="<?php echo base_url(); ?>Books/subIndex/rating" id='rating'>Ratings</a></li>
                <li><a href="<?php echo base_url(); ?>Books/subIndex/price" id='price'>Free</a></li>
            </ul>
    </div>
    </div>


		<?php
		if(count($all_books)=='' || count($all_books)==0){
			echo '<div class="well well-sm" style="padding:0;"><h4>No Records Found!!!</h4></div>';
		}else{	
		for($i=0;$i<count($all_books);$i++){ ?>
		<div class='well' style='padding:16px;background:#fafafa!important;border: 0;'>
		
			<div class='row'>
				<!--<div class='col-sm-2 left'>
				</div>-->
				        <?php if($all_books[$i]['cover_img_name']!='N/A'){ ?>
                            <div class='col-sm-2 left' style='background:url("<?php echo base_url(); ?>uploads/<?php echo $all_books[$i]['cover_img_name']; ?>");background-repeat: no-repeat; background-size: contain;background-position: center;max-height: 100%;max-width: 100%;background-origin: padding-box;'>
                            </div>
                        <?php }else{ ?>
                            <div class='col-sm-2 left' style='background:url("<?php echo base_url(); ?>utils/Images/no-image.png");background-size: cover;background-position: center;'>
                            </div>
                       <?php } ?>
				<div class='col-sm-9 right'>
					<div class='col-sm-5 book_details_on_page'>
						<ul style='margin:0;'>
							<li>Name of Book :</li>
							<li>Book's Author:</li>
							<li>Price of Book :</li>
						</ul>
					</div>
					<div class='col-sm-5 book_details_on_page'>
						<ul style='margin:0;color:orange;'>
							<li style='font-weight:normal;'><?php echo $all_books[$i]['book_title']?></li>
							<li style='font-weight:normal;'><?php echo $all_books[$i]['book_author']?></li>
							<li style='font-weight:normal;'><?php if($all_books[$i]['price'] == 0){echo 'Free';}else{echo 'Rs. '.$all_books[$i]['price'].'.00';} ?></li>
						</ul>
					</div>
					
					<div class='col-sm-2 book_details_on_page' id='distinct_li'>
						<ul style='margin:0;color:orange;'>
							<!--<li><a href='<?php base_url();?>Books/delete_Book/<?php echo $all_books[$i]['id']?>'>Delete</a></li>-->
							<li><a href="#delete_record" data-toggle="modal" data-book-id="<?php echo $all_books[$i]['id']; ?>">Delete</li>
							<?php ?>	
							<li><a href="#edit_record" data-toggle="modal" data-book-id="<?php echo $all_books[$i]['id']; ?>" data-book-title="<?php echo $all_books[$i]['book_title']; ?>" 
							data-book-author="<?php echo $all_books[$i]['book_author']; ?>">Edit</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<?php }}?>
	</body>
</html>