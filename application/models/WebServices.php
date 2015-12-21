<?php
Class WebServices extends CI_Model{

	/* get list of all users. */
	function getAllUsers(){
		
		$url 	= 'http://iris.scanmine.com:8090/users?keyword=';	
		$result = $this->getCurl( $url );
		return $result;
	}

	/*function get single user. */
	function getUserById( $userID ){

	}

	/*function to add  new user. */
	function addNewuser($username, $email, $password, $language ){

	}

	/* get the list of user publicaltion. */
	function getPublications( $userID ){

	}


	function getCurl( $url ){
		// echo  $url = 'http://iris.scanmine.com:8090/users?keyword=';	
		// $url 	=	"http://iris.scanmine.com:8090/getpubtempl?lang=en";
	 	
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