<?php
	class google_data extends CI_Model{
		public function index(){
			
		}
		
		public function insert_userdata($data){
			//print_r($data);exit;
			if($this->db->insert('register_by_google',$data)){
				return true;
			}
		}
	}
?>