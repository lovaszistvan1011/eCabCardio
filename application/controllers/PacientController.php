<?php

class PacientController extends CI_Controller {

    protected $sfn = [];
    protected $sln = [];
    protected $cnp = [];
    protected $options = "";
    protected $fn, $ln, $cn;

    public function __construct() {
        parent::__construct();

        $this->load->helper('form');

        $this->load->model('PacientModel');
    }

    function index() {
        $this->load->view('search');
       }

    public function search_keyword() {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->PacientModel->search($keyword);
        $this->load->view('SelectPatient', $data);
    }
    

    public function edit() {
        $data['rows1'] = $this->PacientModel->expose_c();
        $data['rows2'] = $this->PacientModel->expose_l();
        $data['rows3'] = $this->PacientModel->expose_m();
        $this->load->view('NewPacientView', $data);
    }

    public function listP() {
        $data['rows'] = $this->PacientModel->getData();
        $this->load->view('ListPatient', $data);
    }
    
    public function getInfo() {
        $param = $this->
                $this->load->model('PacientModel');
        //$data['first_name']=$fn;
        //$data['last_name']=$ln;
        //$data['cnp']=$cn;
        //$data['records'] = $this->PacientModel->getData();
        // $this->load->view('PacientView', $data);
    }

   public function details(){

            echo $this->input->get('data_id');
            //$data['details'] = $this->db->details($this->input->get('data_id'));
           // $data['latest_news'] = $this->db->latest_news();
           // $data['main_content'] = "PacientController/details";
            $this->load->view('PacientView',$data);
            $string = $this->load->view('SelectPatient', '', TRUE);


}

    public function savedata() {
        //load registration view form
        $this->load->view('NewPacientView');

        //Check submit button 
        if ($this->input->post('save')) {
            //get form's data and store in local varable
            $new_patient = array("", $_POST['fname'], $_POST['lname'], $_POST['date'], $_POST['county'],
                $_POST['locality'], $_POST['adress'], $_POST['occupation'], $_POST['job'], $_POST['phone'],
                $_POST['email'], $_POST['ID'], $_POST['marital']
            );


//call saverecords method of Hello_Model and pass variables as parameter
            $this->PacientModel->form_insert($new_patient);
            echo "Records Saved Successfully";
        }
    }

}
