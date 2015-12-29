<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
    	parent::__construct();
        $this->load->model('WebServices'); 


      if( $this->session->userdata('logged_in')){
            $session_data   = $this->session->userdata('logged_in');
            $lang           = $session_data['lang'];
            $this->lang->load('message', $lang);
      }else{
          $this->lang->load('message');
      } 
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
            $data['page_title'] = 'dashboard';

            $this->load->view('user/index', $data);

      	}else{

            //If no session, redirect to login page
            redirect('login', 'refresh');
      	}
  	}

    function add_publication(){
        if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');
            
            //If no session, redirect to login page
            if( $session_data['type'] !== 'user'){
                redirect('login', 'refresh');
            }            
            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'add_publication';
            $data['page_title'] = 'Add Publication';

            $this->load->view('user/index', $data);

        }else{

            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    function view_publication(){
        if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');
            
            //If no session, redirect to login page
            if( $session_data['type'] !== 'user'){
                redirect('login', 'refresh');
            }            
            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'view_publication';
            $data['page_title'] = 'View Publication';

            $userID = $session_data['username']; 
            $data['userPublication']   = $this->WebServices->getPublications( $userID );    

            $this->load->view('user/index', $data);

        }else{

            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

  	/*function for logout */
  	function logout(){
    	$this->session->unset_userdata('logged_in');

      $this->session->set_flashdata('flashMessage', 'Logged off Successfully!');
      $this->session->set_flashdata('flashMessageType', 'success');

    	redirect('login', 'refresh');
  	}

}/*class ends */

