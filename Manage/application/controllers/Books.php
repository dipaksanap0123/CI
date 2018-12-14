<?php
	class Books extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			 $this->CI = & get_instance();
			$this->load->library('session');
			$this->load->model('books_model');
			$this->load->library('form_validation');
			$this->load->library('Encryption');
		}
		
		public function index(){
			$this->subIndex('');
		}

		public function subIndex($catagory_order_by){
			$data=array();
			$data['all_books'] = $this->books_model->get_all_books_with_order($catagory_order_by);

 			$data['stat'] = $this->books_model->db_stat();
 			$data['catagory'] = $this->books_model->get_catagory_form();
			$data['user_data']= $this->books_model->get_usr_details();
			$this->load->view('main_view',$data,false);
		}



		

/*  --------------------------------------------------------------  ----- */
		public function add_record_with_upload(){
				$no_image = 'N/A';
				$config['upload_path']          = './uploads';
                $config['allowed_types']        = 'gif|jpg|png';
               	$config['file_name']            =  $this->input->post('book_title');
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('book_cover'))
                    {
					$error = array('error' => $this->upload->display_errors());
					if($error){

                      $this->add_record($no_image);
                      redirect('/Books','refresh');
                    }
                    //$this->load->view('Add_record_view', $error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                 	$this->add_record($data['upload_data']['orig_name']);
                 	redirect('/Books','refresh');
                   // $this->load->view('Add_record_view', $data,false);

                }
		}

		public function add_record($book_cover_image_name){
				$data = array(
					'book_title' => $this->input->post('book_title'),
					'book_author' => $this->input->post('book_author'),
					'book_catagory' => $this->input->post('book_catagory'),
					'language' => $this->input->post('language'),
					'book_priority' => $this->input->post('book_priority'),
					'rating' => $this->input->post('rating'),
					'price' => $this->input->post('price'),
				);

				if(isset($book_cover_image_name)){
					$data['cover_img_name']=$book_cover_image_name;	
				}

				if($this->books_model->insert_record($data)){
					//return true;
					echo '<div class="alert alert-success container">
						<strong>Success!</strong> Indicates a successful or positive action.
					</div>';
					redirect('Books','refresh');
				}
				else{
					redirect(base_url(),'refresh');
					return false;
				}
		}

/* ---------------------------------------------------------------------  */

		public function edit_record_with_upload(){
			$no_image = 'N/A';
				$config['upload_path']          = './uploads';
                $config['allowed_types']        = 'gif|jpg|png';
               	$config['file_name']            =  $this->input->post('book_title_edit_record');
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('book_cover_edit_record'))
                    {
						$error = array('error' => $this->upload->display_errors());
						 if($error='$error'){
                      	$this->update_record($no_image);
                      	//redirect('/Books','refresh');
                      }
                        //$this->load->view('Add_record_view', $error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                   
                 	$this->update_record($data['upload_data']['orig_name']);/*passing Image name to update record function*/
                 	//redirect('/Books','refresh');
                   // $this->load->view('Add_record_view', $data,false);

                }
		}


		public function update_record($book_cover_image_name){
			$data = array(
					'id' => $this->input->post('book_id_edit_record'),
					'book_title' => $this->input->post('book_title_edit_record'),
					'book_author' => $this->input->post('book_author_edit_record'),
					'book_catagory' => $this->input->post('book_catagory_edit_record'),
					'language' => $this->input->post('language_edit_record'),
					'book_priority' => $this->input->post('book_priority_edit_record'),
					'rating' => $this->input->post('rating_edit_record'),
					'price' => $this->input->post('price_edit_record'),
					
				);

				if(isset($book_cover_image_name)){
					$data['cover_img_name']=$book_cover_image_name;	
					// appending file name to to form data
				}

				if($this->books_model->update_record($data)){
					redirect('Books','refresh');
				}
				else{
					return false;
				}
		
		}
/* ---------------------------------------------------------------------  */
		public function delete_Book($id){
			if($this->books_model->delete_book($id)){
				redirect('/Books','refresh');
				return true;
			}
			else{
				redirect('/Books','refresh');
				return false;
			}
		}
		
		public function get_database_stat(){
			$this->books_model->db_stat();
		}
		
		
		/*User OPerations*/
		/*public function register_with_upload(){
			$no_image = 'N/A';
			if(!empty($_FILES['file']['name'])){
			     // Set preference
			     $config['upload_path'] = 'profile_pics/'; 
			     $config['allowed_types'] = 'jpg|jpeg|png|gif';
			     $config['max_size'] = '1024'; // max_size in kb
			     $config['file_name'] = $user_details['username'];

			     //Load upload library
			     $this->load->library('upload',$config); 
			     // File upload
			     if($this->upload->do_upload('file')){
			       // Get data about the file
			       $uploadData = $this->upload->data();

			     }else{
			     	$error = array('error' => $this->upload->display_errors());
					if($error){
                      $this->registration($no_image);
                      redirect('/Books','refresh');
                    }
			     }
			   }
		}*/

		public function registration(){
			$user_details = array();
			$user_details['first_name'] = $this->input->post('first_name');  
			$user_details['middle_name'] =  $this->input->post('middle_name');
			$user_details['last_name'] = $this->input->post('last_name');  
			$user_details['username'] = strtolower(implode('_',array($user_details['first_name'],$user_details['last_name'])).mt_rand(1000,9999));
			$user_details['address'] = $this->input->post('address'); 
			$user_details['email'] = $this->input->post('email_reg'); 
			$user_details['mobile'] =  $this->input->post('mobile');
			$user_details['user_password'] =  $this->encryption->encrypt($this->input->post('password'));
			//$user_details['profile_pic_name']= $usr_profile_pic;*/
			if($this->books_model->user_registration($user_details)){
				return true;
			}
			
		}

		
		public function login(){
			
				$data = [];
				$data['username'] = $this->input->post('username');
				$data['password'] = $this->input->post('password');
				if($this->books_model->check_login_details($data)){
				
					$user_type_for_login=$this->books_model->check_user_type($data['username']);
					//echo "===>".$user_type_for_login[0]['user_type'];exit;
					if(($user_type_for_login[0]['user_type']=='admin') AND ($user_type_for_login[0]['user_type']!='')){
						$this->session->set_userdata('user_type', $user_type_for_login[0]['user_type']);
					}
					//check is user block or not
					if($this->books_model->check_block_or_not($data['username'])=="block"){
						$data['block_state']='blocked';
						$this->session->set_userdata('username', $data['username']);
						$this->session->set_userdata('is_block_session', $data['block_state']);
						redirect('/Books','refresh');
					}
					else{
						$this->session->set_userdata('username', $data['username']);
						$this->session->set_userdata('user_type', 'user');
						$this->session->set_flashdata('userLoggedIn','Logged In....');
						redirect('/Books','refresh');
						
					}
					
				}
				else{
					echo '<script> alert("Username or Password is Wrong"); </script>';
					/*echo "<script type='text/javascript'>
                        $(document).ready(function(){
                        $('#login_failed').modal('show');
                        });
                        </script>";*/
					redirect('/Books','refresh');
				}
			
		}
		
		public function logout(){
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('user_type');
			$this->session->unset_userdata('is_block_session');
			redirect('/Books','refresh');
		}
		
		
		public function load_by_cat($cat){
			echo 'Catagory Got is:'.$cat;
		}

		public function go_to_any_view($view_name){
			$data=array();
			$data['catagory'] = $this->books_model->get_catagory_form();
			$data['images'] = $this->books_model->get_images_for_catagory_menu();
			$data['catagory'] = $this->books_model->get_catagory_form();
			$data['all_books'] = $this->books_model->get_all_books();
			$data['stat'] = $this->books_model->db_stat();
			$data['user_details']= $this->books_model->get_usr_details();
			$this->load->view(''.$view_name.'',$data);
		}
		
		public function block_user($username){
			if($this->books_model->block_user($username)){
				redirect('/Books','refresh');
			}
			//$this->go_to_any_view('manage_user');
			
		}
		
		public function unblock_user($username){
			if($this->books_model->unblock_user($username)){
				redirect('/Books','refresh');
			}
			
		}
		
		public function request_book($book_name,$user){
			if($this->books_model->request_book_to_admin(urldecode($book_name),$user)){
				redirect('/Books','refresh');
				return true;
			}
			redirect('/Books','refresh');
		}
		
		public function request_status($user,$book){
			if($this->books_model->get_user_request_status($user,$book)){
				return true;
			}
		}
		
		public function requests_demands(){
			return $this->books_model->request_demands_details_admin();
		}


		/*public function is_accepted_req($username,$request_id){
			$response_status = $this->books_model->is_req_accept($username,$request_id);

			return $response_status;
			if(count($response_status)>0){
				return true;
			}
		}*/


		public function accept_request(){
			if($this->books_model->accept_request_from_user($this->input->post('request_id'))){
				echo $this->input->post('request_id');
				return true;
			}
		}

		public function reject_request(){
			if($this->books_model->reject_request_from_user($this->input->post('request_id'))){
				echo $this->input->post('request_id');
				return true;
			}
		}


		public function delete_request(){
			$req_id = $this->input->post('request_id');
			if($this->books_model->delete_request_from_user($req_id)){
				return true;
			}
		}


		public function search_data(){
			$to_search = $this->input->post('to_search');
			$returned_searches = $this->books_model->search_all($to_search);
			//print_r($returned_searches);exit;
			if(count($returned_searches)==0){
				echo '<h5 class="text-center">No Records Found</h5>';
			}else
			for($i=0;$i<count($returned_searches);$i++){
				echo '<h5 class="text-center" id="'.$returned_searches[$i]['book_title'].'" data-price="'.$returned_searches[$i]['price'].'" data-rating = "'.$returned_searches[$i]['rating'].'"
				data-image="'.$returned_searches[$i]['cover_img_name'].'" data-toggle="modal" data-target="#view_item">'.$returned_searches[$i]['book_title'].'</h5>';
			}
		}

		public function order_by(){
			$catagory = $this->input->post('catagory');
			redirect('/Books','refresh');
		}


		public function remove_user($username){
			if($this->books_model->remove_user($username)){
				redirect('/Books','refresh');
				return true;
			}
		}

		public function add_to_cart(){
			//add them in cart
			echo $this->input->post('username');
			echo $this->input->post('book_name');
			echo $this->input->post('qty');

		}

		/* -----later use-----
		public function get_book_data_by_catagory($cat){
			$all = $this->books_model->get_book_data_by_catagory_model($cat);
			echo '<pre>';
			print_r($all);
		}*/


		/*public function reg_upload(){
				$no_image = 'N/A';
				$config['upload_path']          = './profile_pics';
                $config['allowed_types']        = 'gif|jpg|png';
               	$config['file_name']            =  $this->input->post('book_title');
                $this->load->library('upload', $config);

                if (  $this->upload->do_upload('file')){
					$data = array('upload_data' => $this->upload->data());
                 	$this->reg($data['upload_data']['orig_name']);
                }
                else
                {
                	$error = array('error' => $this->upload->display_errors());
					if($error){
					print_r($error);
                    $this->reg($no_image);
                      //redirect('/Books','refresh');
                    }
                    //redirect('/Books','refresh');
                   // $this->load->view('Add_record_view', $data,false);

                }
		}

		public function reg($book_cover_image_name){
				$data = array(
					'book_title' => $this->input->post('book_title'),
					'book_author' => $this->input->post('book_author'),
					'book_catagory' => $this->input->post('book_catagory'),
					'language' => $this->input->post('language'),
					'book_priority' => $this->input->post('book_priority'),
					'rating' => $this->input->post('rating'),
					'price' => $this->input->post('price'),
					'user_pic'=> $book_cover_image_name,
					);
				print_r($data);

				if(isset($book_cover_image_name)){
					$data['cover_img_name']=$book_cover_image_name;	
				}

				if($this->books_model->insert_record($data)){
					//return true;
					echo '<div class="alert alert-success container">
						<strong>Success!</strong> Indicates a successful or positive action.
					</div>';
					redirect('Books','refresh');
				}
				else{
					redirect(base_url(),'refresh');
					return false;
				}
		}*/
		
		
		
	}
?>