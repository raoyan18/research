<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Researcher_login extends CI_Controller {

	function __construct() {
        parent::__construct();
        /* chk user logged in or not*/
         $this->load->model('Mdl_admin');

        if($this->session->userdata('researcher_logged_in'))
        {
        	redirect(base_url().'user');
        }
    }

    public function index(){
    	$this->load->view('user/vw_researcher_login'); 
    }

    public function do_login(){
    	 $redirect=$_GET['redirect'];
    	$researcher_username = $this->input->post('researcher_username');
    	$researcher_password = $this->input->post('researcher_password');

    	//$this->form_validation->set_rules('researcher_username','Username','trim|xss_clean|');
    	//$this->form_validation->set_rules('researcher_password','Password','trim|xss_clean|');

    	/*if($this->form_validation->run()==FALSE)
           
    	{   
            
    		$this->load->view('admin/vw_admin_login');
    	}

    	else
    	{*/
            $this->load->library('encrypt');
            $enc_password = md5($researcher_password);
    		$is_valid = $this->Mdl_admin->validate_researcher($researcher_username,$enc_password);
            if($is_valid){
            redirect(base_url().$redirect);
               
            }
            else
            {
                $data['msg_type'] = 'class="alert alert-error"';
                $data['msg'] = '<strong>Access Denied</strong> <br>Invalid Username/Password';
                $this->load->view('user/vw_researcher_login',$data);
            }
    		
    	
    	//}
        

    }

    }

