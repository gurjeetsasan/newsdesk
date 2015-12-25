<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  	function __construct(){
    	parent::__construct();
    	$this->load->helper('form');   
    	$this->load->library('curl'); 	
    	$this->load->model('user');
    	$this->load->model('WebServices');    	
  	}

  	function index(){    	
    	$this->load->view( 'user/login' );
  	}

  	function admin(){
    	$this->load->view( 'admin/login' );    	  		
  	}


  	function checkLogin(){
  		$username 	=  $this->input->post('username'); 
  		$password 	=  $this->input->post('password'); 
		$type 		=  $this->input->post('type');


		if( $type == 'admin'){
			$result = $this->processAdminLogin( $username, $password );
			if( $result ){				
				redirect( 'admin', 'refresh' );
			}else{

				$this->session->set_flashdata('error_message', 'Invalid username or Password.');
				redirect( 'login/admin', 'refresh' );
			}

		}else{

			$result = $this->processUserLogin( $username, $password );
			if( $result ){				
				redirect( 'user', 'refresh' );
			}else{

				$this->session->set_flashdata('error_message', 'Invalid username or Password.');
				redirect( 'login/index', 'refresh' );
			}
		}

  	}

  	/* function for admin login */
  	function processAdminLogin($username, $password){
  		//query the database
    	$result = $this->user->adminLogin($username, $password);

		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row->id,
					'username' 	=> $row->username,
					'type' 		=> 'admin'
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		}else{		
			return false;
		}
  	}/* function ends here. */

  	/* function for user login */
  	function processUserLogin($username, $password){
  		//query the database
    	$result = $this->user->userLogin($username, $password);

		if($result){
			$sess_array = array();
			
			$sess_array = array(
					'id' => $result['id'],
					'username' 	=> $result['username'],
					'type' 		=> 'user'
				);
			$this->session->set_userdata('logged_in', $sess_array);
			
			return true;
		}else{		
			return false;
		}
  	}/* function ends here. */


  	/* Function to Register. */
  	function register(){  	
  		$this->load->view('user/register');
  	}

  	function processRegisterUser(){

		// $userName = trim($this->input->post('userName'));
		// $password = trim($this->input->post('password'));
		  
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
		  
		$userIp = $this->input->ip_address();

		    
		$secret = 	'6LcyyhMTAAAAAHM__PiuH98Laa6W0leveWTB6Yc8';
		  
		$url 	= 	"https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
		  
		$response 	= $this->curl->simple_get($url);
		$status  	= json_decode($response, true);

		//$status['success'] = true;
		  
		if($status['success']){ 

		    $data['uid'] 		=	$this->input->post('email');
		    $data['email'] 		=	$this->input->post('email');
 			$data['password']	=	$this->input->post('password');
			$data['lang']  		=	$this->input->post('lang');
			$data['action']  	=	'ACTION_CREATE';

            $result =  $this->WebServices->createUser( $data );
            if( $result ){
                $data['message']        =  "User Registered Successfully.";
                $data['message_type']   = 'success';
            }else{
                $data['message']        =  "User is already registered!";
                $data['message_type']   = 'error';
            }

            $this->session->set_flashdata('flashMessage', $data['message']);
            $this->session->set_flashdata('flashMessageType', $data['message_type']);
            
            redirect('login/register', 'refresh');
            // echo  $data['message'];
		}else{
		   	$this->session->set_flashdata('flashMessage', 'Sorry Google Recaptcha Unsuccessful!!');
            		$this->session->set_flashdata('flashMessageType', 'error');

		   	redirect('login/register', 'refresh');
		}

  		
  	}

  	/*function for logout */
  	function logout(){
    	$this->session->unset_userdata('logged_in');
    	redirect('home', 'refresh');
  	}/*user*/


}/*class ends here. */

?>
