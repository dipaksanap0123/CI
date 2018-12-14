<style type="text/css">
  .search_item_desc li{
    background: :#ddd;
    padding:2px;
    margin:10px;
    list-style-type:none;
  }

  .count{
    width:3%;
    border:0;
    margin:2px;
  }

  .qty .count {
    color: #000;
    display: inline-block;
    vertical-align: top;
    font-size: 20px;
    font-weight: 700;
    line-height: 30px;
    padding: 0 2px
    ;min-width: 35px;
    text-align: center;
}
.qty .plus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    width: 30px;
    height: 30px;
    font: 30px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    }
.qty .minus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    width: 30px;
    height: 30px;
    font: 30px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    background-clip: padding-box;
}

/*Prevent text selection*/

input:disabled{
    background-color:white;
}

</style>
<script type="text/javascript">
  $(document).ready(function(){
        $('.count').prop('disabled', true);
            $(document).on('click','.plus',function(){
            $('.count').val(parseInt($('.count').val()) + 1 );
            });
          $(document).on('click','.minus',function(){
            $('.count').val(parseInt($('.count').val()) - 1 );
                if ($('.count').val() == 0) {
                $('.count').val(1);
              }
          });
    });
</script>
<div class="modal fade" id="view_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Item Description</h4>
        </div>
      <div class="modal-body">
       <h3 id='item_name'></h3>
      <div class='row'>
        <div class='col-md-5 text-center' style='border:1px solid #ddd;border-radius:4px;'>
          <img class='cover_img' width="auto" height="200px">          
        </div>
        <div class='col-md-7 search_item_desc'>
          <ul class=''>
            <li>
              <label>Name:<?php echo '<span class="desc_name">'; ?></label>    
            </li>
            <li>
              <label>Price:<?php echo ' Rs. <class id="desc_price">'; ?></label> 
            </li>
            <li>
              <label>Rating:<?php echo ' <span class="desc_rating">'; ?></label>   
            </li>

            <li><label> Quentity:
              <div class="qty mt-5">
                  <span class="minus bg-dark">-</span>
                  <input type="number" class="count" name="spcl_qty"
                  id='spl_qty' value="1">
                  <span class="plus bg-dark">+</span>
              </div></label>
            </li>
          </ul>
          
        </div>
        
      </div>
      </div>
      <?php if($this->session->userdata('username') && $this->session->userdata('user_type')!='admin'){ ?>
      <div class="modal-footer">

         <a class='btn btn-default btn-sm' id='add_to_cart' data-usr='<?php echo $this->session->userdata('username'); ?>' data-book='' data-dismiss='modal'>Add To Cart.</a>
         <a class='btn btn-default btn-sm'>Buy Now.</a>
      </div>
    <?php }else{

      echo "<div class='modal-footer'>
         <a class='btn btn-warning btn-block' data-toggle='modal' data-target='#exampleModal' data-dismiss='modal' id='login_from_search'>Please Login to continue.</a>
      </div>";

    }?>
    </div>
  </div>
</div>