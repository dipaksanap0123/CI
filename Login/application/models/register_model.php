<?php 
	class register_model extends CI_Model{
		public function index(){
			
		}

		public function register_user($data){
			$this->db->where('owner_id',$data['owner_id']);
   			$query = $this->db->get('register');
   			if ( $query->num_rows() > 0 ) 
		   	{
		   		$data['owner_id'] = mt_rand(10000, 99999); 
		   		if($this->db->insert('register',$data)){
					return true;
				}
		   	}
		   	else{
		   		if($this->db->insert('register',$data)){
					return true;
				}
		   	}
		}



		public function login_user($data){
			$query = $this->db->query('select email, password from register where (email="'.$data["email"].'")')->result_array();
			if($query){
				if(($data["email"] == $query[0]['email']) && ($this->encryption->decrypt($query[0]['password']) == $this->encryption->decrypt($data["password"]) )){
					
					  return true;
				}
				  
				else{
					return false;
				}
			}
		}





		public function register_user_by_google($data){
			//print_r($data);
   			$query = $this->db->get_where('register', array('email'=>$data['email']));
   			if ( $query->num_rows() > 0 ) 
		   	{
		   		return false;
		   	}
		   	else{
		   		if($this->db->insert('register',$data)){
		   			return true;
		   		}
		   	}
		}


		public function register_user_by_fb($data){
			//print_r($data);
			$this->db->where('social_id',$data['social_id']);
   			$query = $this->db->get('register');
   			/*$query = $this->db->get_where('register', array('social_id' => $data['social_id'],'owner_id'=>$data['owner_id']));*/
   			if ( $query->num_rows() > 0 ) 
		   	{
		   		return false;
		   	}
		   	else{
		   		if($this->db->insert('register',$data)){
		   			return true;
		   		}
		   	}
		}


		public function check_google_login_user($data){
			//print_r($data);
			$query =$query =$this->db->get_where('register', array('social_id' => $data['social_id'], 'social_id'=>$data['social_id']));
			if ( $query->num_rows() > 0 ) 
		   	{
		   		return true;//User Present in our system
		   	}
		   	else{
		   		return false;
		   	}

		}



		public function check_fb_login_user($data){
			$query = $this->db->query('select social_id from register where social_id="'.$data['social_id'].'" ');
			if ( $query->num_rows() > 0 ) 
		   	{
		   		return true;//User Present in our system
		   	}
		   	else{
		   		return false;
		   	}

		}



		public function get_userdetails($email){
			$details = $this->db->query('select social_id, full_name,email,register_from, owner_id from register where (email = "'.$email.'" OR social_id="'.$email.'")')->result_array();
			return $details;
		}

		public function is_email_present($email){
			$query = $this->db->get_where('register', array('email'=>$email));
   			if ( $query->num_rows() > 0 ) 
		   	{
		   		return true;
		   	}
		   
		}

		public function save_email_otp($email,$otp){
			$data['email'] = $email;
			$data['otp'] = $otp;
			if($this->db->insert('recover_password',$data)){
				return true;
			}
		}


		public function change_password($data){
			$this->db->where('email', $data['email']);
    		$this->db->update('register', array('password' => $data['password']));
			return true;
		}

		
	}
?>