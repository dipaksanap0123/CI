<?php 
	class login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('google_data');
		}

		public function index(){
			$this->load->view('login');
		}

		public function welcome(){
			$data = array();
			$data['google_id'] = $this->input->post('google_id');
			$data['full_name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['profile_picture'] = $this->input->post('profile_pic');
			print_r($data);
			if($this->google_data->insert_userdata($data)){
				return true;
			}
		}

		public function move_view(){
			$this->load->view('welcome');
		}
	}

?>

