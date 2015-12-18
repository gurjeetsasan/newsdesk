<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
    	parent::__construct();
  	}

  	function index(){
      	if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'dashboard';
            $data['page_title'] = 'Dashboard';

            $this->load->view('admin/index', $data);

      	}else{

            //If no session, redirect to login page
            redirect('login/admin', 'refresh');
      	}
  	}

    function user_list(){
        if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'user_list';
            $data['page_title'] = 'User List';

            $this->load->view('admin/index', $data);

        }else{

            //If no session, redirect to login page
            redirect('login/admin', 'refresh');
        }
    }


    function add_user(){
        if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'add_user';
            $data['page_title'] = 'Add User';

            $this->load->view('admin/index', $data);

        }else{

            //If no session, redirect to login page
            redirect('login/admin', 'refresh');
        }
    }
  	
  	/*function for logout */
  	function logout(){
    	$this->session->unset_userdata('logged_in');
    	redirect('login/admin', 'refresh');
  	}

}/*class ends */

