<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  	function __construct(){
    	parent::__construct();
    	$this->load->helper('form');    	
    	$this->load->model('user');    	
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
				redirect( 'login', 'refresh' );
			}

		}else{

		}

  	}

  	/* function for admin login */
  	function processAdminLogin($username, $password){
  		//query the database
    	$result = $this->user->login($username, $password);

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


  	/*function for logout */
  	function logout(){
    	$this->session->unset_userdata('logged_in');
    	redirect('home', 'refresh');
  	}/*user*/


}/*class ends here. */

?>