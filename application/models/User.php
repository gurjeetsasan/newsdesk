<?php
Class User extends CI_Model{

	function adminLogin($username, $password){
		
	/*	$this -> db -> select('id, username, password');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
		$this -> db -> limit(1);*/
		

		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . $password . "'"); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}

	function userLogin( $username, $password){
		
		if( ($username == 'gurjeet' && $password == '12345') ){
			
			$data = array();

			$data['id'] 		= '1';
			$data['username'] 	= 'gurjeet';

			return  $data;

		}else{
			return false;
		}


		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}

	

}/*Class Ends Here. */

?>


