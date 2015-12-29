<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
    	parent::__construct();
        $this->load->model('WebServices');   
  	}

  	function index(){
      	if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');
            
            //If no session, redirect to login page
            if( $session_data['type'] !== 'user'){
                redirect('login', 'refresh');
            }

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'dashboard';
            $data['page_title'] = 'Dashboard';

            $this->load->view('user/index', $data);

      	}else{

            //If no session, redirect to login page
            redirect('login', 'refresh');
      	}
  	}

  	/*function for logout */
  	function logout(){
    	$this->session->unset_userdata('logged_in');
    	redirect('login', 'refresh');
  	}

}/*class ends */

