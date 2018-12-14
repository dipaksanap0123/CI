<?php
	class Books_Model extends CI_Model{
		public function index(){
			
		}
		
		public function get_images_for_catagory_menu(){
			$image_name = $this->db->query('select image_name from Images_name where for_which_case="menu_slider_catagory"')->result_array();
			return $image_name;
		}
		
		public function get_catagory_form(){
			
			$data = array();
			$data['catagory']= $this->db->query('select type from book_catagory where catagory_name ="cat"')->result_array();
			$data['ratings']= $this->db->query('select type from book_catagory where catagory_name ="ratings"')->result_array();
			$data['priority']= $this->db->query('select type from book_catagory where catagory_name ="priority"')->result_array();
			$data['language']= $this->db->query('select type from book_catagory where catagory_name ="language"')->result_array();
			
			return $data;
		}
		
		public function insert_record($data){
			
			if($this->db->insert('library',$data)){
				return true;
			}
			else{
				return false;
			}
		}


		public function update_record($data){
			$this->db->where('id', $data['id']);
			$this->db->update('library', $data);
			return true;
		}
		
		public function get_all_books(){
			$all_books = $this->db->query('select id,book_title, book_author, price, rating, cover_img_name from library')->result_array();
			return $all_books;
		}
		

		public function get_all_books_with_order($catagory){
			if($catagory == ''){
				$all_books = $this->db->query('select id,book_title, book_author, price, rating, cover_img_name from library')->result_array();
			}elseif($catagory == 'rating'){
				$all_books = $this->db->query('select * from library ORDER BY '.$catagory.' DESC')->result_array();
			}
			else{
				$all_books = $this->db->query('select * from library ORDER BY '.$catagory.' ASC')->result_array();
			}

			return $all_books;
		
		}
		
		
		public function delete_book($id){
			$this->db->where('id', $id);
			$this->db->delete('library');
			return true;
		}

		public function remove_user($username){
			$this->db->where('username', $username);
			$this->db->delete('user_details');
			return true;
		}
		
		public function db_stat(){
			$query = $this->db->query('SELECT * FROM library');
			return $query->num_rows();
		}
		
		public function num_of_users(){
			$query = $this->db->query('SELECT * FROM user_details');
			return $query->num_rows();
		}
		
		public function user_registration($user_details){
			$this->db->insert('user_details',$user_details);	
		}
		
		public function check_user_type($username){
			$query = $this->db->query('select user_type from user_details where (username="'.$username.'" OR email="'.$username.'")')->result_array();
			return $query;
		}
		
		public function check_login_details($data){
			
			/*$query = $this->db->query('select username, user_password, email from user_details where (email="'.$data['username'].'" OR username="'.$data['username'].'" ) AND user_password ="'.$data['password'].'"');*/
			//$query = $this->db->query('select username, user_password, email from user_details where (username="'.$data["username"].'" OR email="'.$data["username"].'") AND '.$this->encryption->decrypt($query[0]['user_password']) == $data["username"])->result_array();
			$query = $this->db->query('select username, user_password, email from user_details where (username="'.$data["username"].'" OR email="'.$data["username"].'")')->result_array();
			if($query){
			
			  if($this->encryption->decrypt($query[0]['user_password'])==$data["password"] ){
				return true;
			  }
			
			  else{
				return false;
			  }
			}
			else{
				return false;
			}
			  /*if ($query->num_rows() == 1) {
			  return true;
			  } else {
			  return false;
			  }*/
			
		}
		
		public function check_block_or_not($username){
			$res=$this->db->query('select is_blocked from user_details where username="'.$username.'" AND is_blocked="1"')->result_array();
			if(isset($res[0]) && ($res[0]['is_blocked']==1)){
				return 'block';
			}
			else{
				return 'unblock';
			}
		}
		
		public function get_book_data_by_catagory_model($cat){
			return $this->db->query('select * from library where book_catagory = "'.$cat.'"')->result_array();
		}
		
		public function get_usr_details(){
			return $this->db->query('select username, first_name, middle_name,last_name, address, email, mobile, is_blocked from user_details where user_type="user"')->result_array();

		}

		public function get_specific_usr_details($username){
			return $this->db->query('select username, first_name, last_name, email, mobile from user_details where username="'.$username.'"')->result_array();

		}


		
		public function block_user($username){
			if($this->db->query('update user_details set is_blocked="1" where username="'.$username.'"')){
				return true;
			}else{
				return false;
			}
		}
		
		public function unblock_user($username){
			if($this->db->query('update user_details set is_blocked="0" where username="'.$username.'"')){
				return true;
			}else{
				return false;
			}
		}
		
		public function request_book_to_admin($title,$user){
			$data = [];
			$data['book_name'] = $title;
			$data['username'] = $user;
			$data['request_id']= 'BR_'.rand ( 1000 , 9999 );
			$data['date_time'] = date('Y/m/d H:i:s');
			if($this->db->insert('request_to_admin',$data)){
				return true;
			}
		}
		
		public function get_user_request_status($username,$bookname){
			$request_status = $this->db->query('select username, book_name, request_id from request_to_admin where username="'.$username.'" AND book_name="'.$bookname.'"')->result_array();
			
			return $request_status;
			//***********old
		}


		public function request_demands_details_admin(){
			$requests = $this->db->query('select book_name, username, request_id, is_accepted, is_rejected from request_to_admin')->result_array();
			return $requests;
		}


		public function is_req_accept($username,$request_id){
			//returns 1. request_id 2. requesting username 3. is_accepted 4.is_rejected so that one can iddentify the request status
			$data = $this->db->query('select username, request_id, is_accepted from request_to_amin where username="'.$username.'" AND request_id = "'.$request_id.'" AND is_accepted="0"')->result();
			print_r($data);exit;
			if(!empty( $data )){
				return $data;	
			}
			
		}


		public function accept_request_from_user($req_id){
			if($this->db->query('update request_to_admin set  is_accepted="0" where request_id="'.$req_id.'"')){
				return true;
			}
			else{
				return false;
			}
		}

		public function reject_request_from_user($req_id){
			if($this->db->query('update request_to_admin set is_rejected="0" where request_id="'.$req_id.'"')){
				return true;
			}
			else{
				return false;
			}
		}

		public function delete_request_from_user($req_id){
			if($this->db->query("DELETE FROM request_to_admin WHERE request_id = '".$req_id."';")){
				return true;
			}
		}

		public function search_all($keyword){
			$matching_searches = $this->db->query('select book_title,price,rating,cover_img_name from library where book_title LIKE "'.$keyword.'%"')->result_array();
			return $matching_searches;
		}

	}
?>