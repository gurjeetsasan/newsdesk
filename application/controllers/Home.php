<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

  function __construct(){
      parent::__construct();
  }

  function index(){
      if( $this->session->userdata('logged_in')){
            $session_data       = $this->session->userdata('logged_in');

            $data['username']   = $session_data['username'];
            $data['type']       = $session_data['type'];

            $this->load->view('admin/home', $data);
      }else{

            //If no session, redirect to login page
            redirect('login/admin', 'refresh');
      }
  }

  
}/*class ends here. */

?>