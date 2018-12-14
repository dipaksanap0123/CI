<?php 
	class Register_with_social extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('register_model');
			
			$this->load->library('Encryption');

		}

		public function index(){
			//$this->load->view('view');
			if($this->session->userdata('username')){
				$userdata['details'] = $this->register_model->get_userdetails($this->session->userdata('username'));
				$this->load->view('Dashboard',$userdata);
			}else{
				$this->load->view('Register_page');
			}
			
		}


		public function recover_password(){
			$this->form_validation->set_rules('email_recover', 'Email', 'required|valid_email|callback_rolekey_exists');
	        if($this->form_validation->run() == FALSE){
	        	$errors = array();
	        	$errors['email_recover'] = form_error('email_recover');
	        	echo json_encode($errors);
	        }
	        else{
	        	$email = $this->input->post('email_recover');
	        	$otp = mt_rand(1000, 9999);
	        	if(!$this->register_model->is_email_present($email)){
	        		echo "false";
				}else{
					if($this->send_email($email,$otp)){
						//$this->session->set_flashdata('email', $email);older
						$this->session->set_userdata('temp_email', $email);
						$this->session->set_flashdata('otp', $otp);
						//$this->session->flashdata('email')---->get data
						echo "true";
					} //send mail
				}
	        }
		}

		public function send_email($email,$otp){
			
			$msg = 'Hello, Your One Time Password for account recovery is '.$otp. '. Please Confirm.';
			 $config = Array(
			  'protocol'=> 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => '465',
			  'smtp_user' => 'dipaksanapimpdata0123@gmail.com',
			  'smtp_pass' => '9970122092 Dvs@',
			  'mailpath' => ''
			); 
			$this->load->library('email',$config);
			  $this->email->set_newline("\r\n");
			  $this->email->from("dipaksanapimpdata0123@gmail.com", 'Admin');
			  $this->email->to($email);
			  $this->email->subject('Confirm OTP');
			  $this->email->message($msg);
			  if (!$this->email->send()) {
			    show_error($this->email->print_debugger()); }
			  else {
			  	if($this->register_model->save_email_otp($email,$otp)){
			  		
			  		return true;
			  	}
			  }
		}


		public function check_otp_to_change_password(){
			$this->form_validation->set_rules('otp_recover_password', 'OTP', 'required|exact_length[4]');
			if($this->form_validation->run() == FALSE){
	        	$errors = array();
	        	$errors['otp_recover_password'] = form_error('otp_recover_password');
	        	echo json_encode($errors);
	        }
	        else{
	        	$user_otp =  $this->input->post('otp_recover_password');
	        	
	        	if($this->session->flashdata('otp') == $user_otp){
	        		echo "true";
	        	}else{
	        		echo "false";
	        	}
			}
		}	



		public function change_password(){
			 $this->form_validation->set_rules('new_password', 'Password', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/]');

			  $this->form_validation->set_rules('confirm_password', 'Password', 'required|matches[new_password]');

			  if($this->form_validation->run() == FALSE){
	        	$errors = array();
	        	$errors['new_password'] = form_error('new_password');
	        	$errors['confirm_password'] = form_error('confirm_password');
	        	echo json_encode($errors);
	        }
	        else{
	        	$data= [];
	        	$data['password'] = $this->encryption->encrypt($this->input->post('new_password'));
	        	$data['email'] = $this->session->userdata('temp_email');
	        	if($this->register_model->change_password($data)){
	        		echo 'true';
	        	}
	        }
		}

		public function validate_form_register(){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[register.email]');
	        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/]');

	        /*
				1] Min 1 uppercase letter.
	            2] Min 1 lowercase letter.
	            3] Min 1 special character.
	            4] Min 1 number.
	            5] Min 8 characters.
	            6] Max 30 characters.
	        */

	        $this->form_validation->set_message('is_unique', 'The %s is already Exists. Please Login.');
	        if($this->form_validation->run() == FALSE){
	        	$errors = array();
	        	$errors['email'] = form_error('email');
	        	$errors['password'] = form_error('password');
	        	//return $errors;
	        	echo json_encode($errors);
	        }
	        else{
	        	$userdata['email'] = $this->input->post('email',true);
	        	$userdata['password'] = $this->encryption->encrypt($this->input->post('password',true));
	        	$userdata['register_from'] = $this->input->post('reg_type',true);
	        	$userdata['owner_id'] = mt_rand(10000, 99999);
				if($this->register_model->register_user($userdata)){
					$this->session->set_userdata('username',$userdata['email']);
					echo 'true';
				}
	        }

		}
		
		
		public function validate_form_login(){
			$this->form_validation->set_rules('email_login', 'Email', 'required|valid_email');
	        $this->form_validation->set_rules('password_login', 'Password', 'required|alpha_numeric_spaces');

	        if($this->form_validation->run() == FALSE){
	        	$errors = array();
	        	$errors['email'] = form_error('email_login');
	        	$errors['password'] = form_error('password_login');
	        	echo json_encode($errors);
	        }
	        else{
	        	$userdata['email'] = $this->input->post('email_login',true);
	        	$userdata['password'] = $this->encryption->encrypt($this->input->post('password_login',true));
	        	$userdata['register_from'] = $this->input->post('login_in_by',true);
				
				if($this->register_model->login_user($userdata)){
					$this->session->set_userdata('username',$userdata['email']);
					echo 'true';
				}
				else{
					echo 'false';
				}
	        }

		}

		public function login_by_google(){
			$data ['social_id'] = $this->input->post('id');
			$data['email'] = $this->input->post('email');
			if($this->register_model->check_google_login_user($data))
			{
				echo "true";
				$this->session->set_userdata('username',$data['email']);
			}else{
				echo "false";
			}
		}

		public function login_by_fb(){
			$data ['social_id'] = $this->input->post('id');
			$data ['name'] = $this->input->post('name');
			if($this->register_model->check_fb_login_user($data))
			{
				echo "true";
				$this->session->set_userdata('username',$data['social_id']);
			}else{
				echo "false";
			}
		}



		public function register_by_google(){
			$data = [];
			$data['social_id'] = $this->input->post('id');
			$data['full_name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['profile_pic'] = $this->input->post('image_url');
			$data['gender'] = $this->input->post('gender');
			$data['owner_id'] = mt_rand(10000, 99999);
			if($this->register_model->register_user_by_google($data)){
				 echo 'true';
				 $this->session->set_userdata('username',$data['email']);
			}else{
				 echo 'false';
				 $this->session->set_userdata('username',$data['email']);
			}
		}


		public function register_by_fb(){
			$data = [];
			$data['social_id'] = $this->input->post('id');
			$data['full_name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['profile_pic'] = $this->input->post('profile_picture');
			$data['gender'] = $this->input->post('gender');
			$data['register_from'] = $this->input->post('register_from');//hidden feild to get register type
			$data['owner_id'] = mt_rand(10000, 99999);
			if($this->register_model->register_user_by_fb($data)){
				 echo 'true';
				$this->session->set_userdata('username',$data['social_id']);

			}else{
				 echo 'false';
				 $this->session->set_userdata('username',$data['social_id']);
			}
		}
		
		public function logout(){
			$this->session->unset_userdata('username');
			redirect('/Register_with_social','refresh');
		}
	
	}

?>