<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

    function user_list( $action = null,  $userID = null){

        if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'user_list';
            $data['page_title'] = 'User List';

            /*check if user want to delete. */
            if( $action == 'delete' ){
                   
                   if( $userID == null ){
                        $data['message']        = 'Error! User ID not Found.';
                        $data['message_type']   =  "success";
                   }else{
                        
                        $result =  $this->WebServices->deleteUser( $userID );
                        if( $result ){
                            $data['message']        =  "User Deleted Successfully.";
                            $data['message_type']   =  "success";
                        }else{
                            $data['message']        =  "Error! Deleting User.";                    
                            $data['message_type']   =  "error";
                        }
                   }
            }

            $data['userList']   = $this->WebServices->getAllUsers();            

            $this->load->view('admin/index', $data);

        }else{

            //If no session, redirect to login page
            redirect('login/admin', 'refresh');
        }
    }

    /*function to update user, */
    function update_user( $userID = null ){



        if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
             
            $data['page_name']  = 'udpate_user';
            $data['page_title'] = 'Update User';

            /* check if argument is passed */
            if( $userID == null ){
                redirect('admin/user_list', 'refresh');               
            }

            /*update functionality here */
            if( $userID == 'create'){
                /* functionality to update user. */
                $result =  $this->WebServices->updateUser( $_POST );

                if( $result ){
                    $data['message']        =  "Update Successfully.";
                    $data['message_type']   = 'success';
                }else{
                    $data['message']        =  "Error! Updating user.";                    
                    $data['message_type']   = 'error';
                }

                $userID = $this->input->post('uid');                
            }

            $data['userData']   = $this->WebServices->getUserById( $userID );
            
            $this->load->view('admin/index', $data);

        }else{

            //If no session, redirect to login page
            redirect('login/admin', 'refresh');
        }
    }


    function add_user( $action = null ){
        if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'add_user';
            $data['page_title'] = 'Add User';

            if( $action == 'create' ){

                $_POST['uid'] = $this->input->post('email');
                $result =  $this->WebServices->createUser( $_POST );
                if( $result ){
                    $data['message']        =  "User Created Successfully.";
                    $data['message_type']   = 'success';
                }else{
                    $data['message']        =  "Error! User not Created. Please try again later.";
                    $data['message_type']   = 'error';
                }                
            }

            $this->load->view('admin/index', $data);

        }else{

            //If no session, redirect to login page
            redirect('login/admin', 'refresh');
        }
    }


    /*function to get the list of publications. */
    function view_publication( $userID = null ){

        if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];
            
            $data['page_name']  = 'view_publication';
            $data['page_title'] = 'View Publication';

            if( $userID == null ){
               redirect('admin/user_list', 'refresh');
            }

            $data['userPublication']   = $this->WebServices->getPublications( $userID );    

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

