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
		
		$url = 'http://iris.scanmine.com:8090/getuser?uid='.$username;
		$response = $this->getCurl( $url );

		$result = json_decode($response);
		
		if( $result ){
			if( ( $password == $result->password ) ){
			
				$data = array();

				$data['id'] 		= '1';
				$data['username'] 	= $result->email;
				$data['lang'] 		= $result->language;

				return  $data;

			}else{
				return false;
			}	

		}else{
			return false;
		}	
	}


	function getCurl( $url ){
		
	 	// OK cool - then let's create a new cURL resource handle
	    $ch = curl_init();
	 
	    // Now set some options (most are optional)
	 
	    // Set URL to download
	    curl_setopt($ch, CURLOPT_URL, $url );
	 
	    // Set a referer
	    curl_setopt($ch, CURLOPT_REFERER, "http:/iris.scanmine.com/");
	 
	    // User agent
	    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	 
	    // Include header in result? (0 = yes, 1 = no)
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	 
	    // Should cURL return or print out the data? (true = return, false = print)
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	    // Timeout in seconds
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	 
	    // Download the given URL, and return output
	    $output = curl_exec($ch);
	 
	    // Close the cURL resource, and free system resources
	    curl_close($ch);
	 	
		return $output;
	}


	

}/*Class Ends Here. */

?>


