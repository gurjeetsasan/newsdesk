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

		$url 	= 'http://iris.scanmine.com:8090/getuser?uid='.$userID;	
		$result = $this->getCurl( $url );
		return $result;

	}

	/*function to add  new user. */	
	function createUser( $userData ){

		$url 		= 'http://iris.scanmine.com:8090/postuser';	 
		$postData 	= $userData;

		$result = $this->putCurl( $url, $postData );

		if( $result == 200 ){
			return true;
		}else{
			return false;	
		}		
	}

	/* function to delete user */
	function deleteUser( $userID ){
		
		$url = 'http://iris.scanmine.com:8090/deluser';
		
		$postData['action'] = 'Delete';
		$postData['uid'] 	= $userID;


		$result = $this->putCurl( $url, $postData );

		if( $result == 200 ){
			return true;
		}else{
			return false;	
		}
	}

	/* get the list of user publicaltion. */
	function getPublications( $userID ){
		$url 	= 'http://iris.scanmine.com:8090/getpubs?uid='.$userID."&keyword=";	
		$result = $this->getCurl( $url );
		return $result;
	}

	/*function to udpate existing user */
	function updateUser( $userData ){

		$url 		= 'http://iris.scanmine.com:8090/postuser';	 
		$postData 	= $userData;

		$result = $this->putCurl( $url, $postData );

		if( $result == 200 ){
			return true;
		}else{
			return false;	
		}		
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

	/*function f for Post Url calls */
	function putCurl( $url, $postData ){

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

	    //  set the Post property
	    curl_setopt($ch,CURLOPT_POST,true);

	    // send post datda
	    curl_setopt($ch,CURLOPT_POSTFIELDS, $postData);
	 
	    // Timeout in seconds
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	 
	    // Download the given URL, and return output
	    $output = curl_exec($ch);
	 
	    // Close the cURL resource, and free system resources
	    curl_close($ch);

		return $output;	

	}/* function ends here. */

}/*Class Ends Here. */

?>
