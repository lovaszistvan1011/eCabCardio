<?php

Class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('template');
        
    
    }

    
    public function login(){
        $data['title']='Login Form';
        
        $this->template->load('PlainWithoutMenu','login',$data);
    }
    
    public function login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Utilizator', 'required');
        $this->form_validation->set_rules('password','Parola', 'required');
        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
             $this->load->model('LoginModel');
            if($this->LoginModel->can_login($username,$password))
            {                
              $session_data = array(
                'username' => $username ); 
                 $this->session->set_userdata($session_data);
               redirect(base_url().'LoginController/enter');
            }
            else
            {
                $this->session->set_flashdata('error', 'Utilizator si parola gresita');
               redirect(base_url().'login');
            }
        }
        else
        {
            $this->login();
        }
    }
    
    public function enter(){
        if($this->session->userdata('username')!= '')
        {
            redirect(base_url().'home');
            echo '<h2> Bun venit, '.$this->session->userdata('username').'</h2>';
            echo '<label><a href = "http://localhost/eCabCardio/login">Logout</a></label>';
        }
        else
            redirect(base_url ().'login');
    }

    function logout(){
        $this->session->unset_userdate('username');
       redirect(base_url().'login');
    }

    
}