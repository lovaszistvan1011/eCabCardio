<?php

class PacientController extends CI_Controller{
    
    protected $sfn = [];
    protected $sln = [];
    protected $cnp = [];
    protected $options = "";


    public function index(){
               
        $this->load->model('PacientModel');
        // $this->load->view('SelectPatient');
        $data['records'] = $this->PacientModel->getData();
       
        $this->load->view('SelectPatient', $data);
        
    }
    
    public function getInfo(){
        $this->load->model('PacientModel');
        $data['records'] = $this->PacientModel->getData();
         $this->load->view('PacientView',$data);
    }

        public function edit(){
       // var_dump($_GET);
       $this->load->view('NewPacientView'); 
    }
    
    public function listP(){
       // var_dump($_GET);
       $this->load->view('ListPatient');
    }
}

