<<<<<<< HEAD
<?php

class PacientController extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->model('PacientModel');
        $this->load->library(['pagination', 'template']);
    }
    

    function index() {
       $data =[
            'title'=>''
        ];
        $this->template->load('Plain', 'search', $data); 
       //$this->load->view('search');
    }
    
    function design(){
        $data =[
            'title'=>''
        ];
        $this->template->load('Plain', 'search', $data);
    }

    public function search_keyword() {
        $data =[
            'title'=>''
        ];
        $this->template->load('Plain','search', $data);
        $config = array();
        $config["base_url"] = base_url() . "PacientController/search_keyword";
        $config["total_rows"] = $this->PacientModel->record_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $keyword = $this->input->post('keyword');

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->PacientModel->fetch_departments($config["per_page"], $page, $keyword);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('SelectPatient', $data);
    }

    public function details() {
         $data =[
            'title'=>''
        ];
        $id_p = $this->uri->segment(3);
        $data['records'] = $this->PacientModel->getData($id_p);
        $data['rows1'] = $this->PacientModel->expose_c($id_p);
        $data['rows2'] = $this->PacientModel->expose_l($id_p);
         $this->template->load('Plain','PacientView', $data);
       // $this->load->view('PacientView', $data);
    }

    public function insert_data() {
        $data =[
            'title'=>'Pacient nou'
        ];
        $data['rows1'] = $this->PacientModel->county_list();
        $data['rows2'] = $this->PacientModel->locality_list();
        //$this->load->view('NewPacientView', $data);
        $this->template->load('Plain', 'NewPacientView', $data);
    }

    public function savedata() {

        if (!empty($_POST)) {
            $save = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'birth_date' => $this->input->post('birth_date'),
                'address' => $this->input->post('address'),
                'occupation' => $this->input->post('occupation'),
                'job' => $this->input->post('job'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'cnp' => $this->input->post('cnp'),
                'marital_status' => $this->input->post('listm'),
                'id_county' => $this->input->post('listc'),
                'id_locality' => $this->input->post('listl'));


            $this->PacientModel->form_insert($save);
            echo '<script>alert("Pacientul a fost inregistrat!");</script>';
            redirect('PacientController/', 'refresh');
        }
    }

    public function edit() {
         $data =[
            'title'=>''
        ];
        $id_edit = $this->uri->segment(3);
        // var_dump($id_edit);
        $data['rows1'] = $this->PacientModel->county_list();
        $data['rows2'] = $this->PacientModel->locality_list();
        $data['data'] = $this->PacientModel->getData($id_edit);
        $data['row1'] = $this->PacientModel->expose_c($id_edit);
        $data['row2'] = $this->PacientModel->expose_l($id_edit);
        $this->template->load('Plain','EditPacientView',$data);
      //  $this->load->view('EditPacientView', $data);
    }

    public function editpatient() {
        $id = $this->input->post('idp');
        $update = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'birth_date' => $this->input->post('birth_date'),
            'address' => $this->input->post('address'),
            'occupation' => $this->input->post('occupation'),
            'job' => $this->input->post('job'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'cnp' => $this->input->post('cnp'),
            'marital_status' => $this->input->post('listm'),
            'id_county' => $this->input->post('listc'),
            'id_locality' => $this->input->post('listl'));

        $this->PacientModel->updatepatient($update, $id);
        echo '<script>alert("Datele sunt modificate!");</script>';
        redirect('/PacientController/details/' . $id, 'refresh');
    }

}
=======
<?php

class PacientController extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        $this->load->model('PacientModel');
        $this->load->library(['pagination', 'template']);
    }

    function index() {
        $data=[
            'title'=>''
        ];
      $this->template->load('Plain', 'search',$data);
    }
    
    public function design() {
        $data=[
            'title'=>''
        ];
//      $this->load->view('search');
      $this->template->load('Plain', 'search',$data);
    }

    public function search_keyword() {
        $this->load->view('search');
        $config = array();
        $config["base_url"] = base_url() . "PacientController/search_keyword";
        $config["total_rows"] = $this->PacientModel->record_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $keyword = $this->input->post('keyword');

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->PacientModel->fetch_departments($config["per_page"], $page, $keyword);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('SelectPatient', $data);
    }

    public function details() {
        $id_p = $this->uri->segment(3);
        $data['records'] = $this->PacientModel->getData($id_p);
        $data['rows1'] = $this->PacientModel->expose_c($id_p);
        $data['rows2'] = $this->PacientModel->expose_l($id_p);

        $this->load->view('PacientView', $data);
    }

    public function insert_data() {
        $data['rows1'] = $this->PacientModel->county_list();
        $data['rows2'] = $this->PacientModel->locality_list();
        $this->load->view('NewPacientView', $data);
    }

    public function savedata() {

        if (!empty($_POST)) {
            $save = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'birth_date' => $this->input->post('birth_date'),
                'address' => $this->input->post('address'),
                'occupation' => $this->input->post('occupation'),
                'job' => $this->input->post('job'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'cnp' => $this->input->post('cnp'),
                'marital_status' => $this->input->post('listm'),
                'id_county' => $this->input->post('listc'),
                'id_locality' => $this->input->post('listl'));


            $this->PacientModel->form_insert($save);
            echo '<script>alert("Pacientul a fost inregistrat!");</script>';
            redirect('PacientController/', 'refresh');
        }
    }

    public function edit() {
        $id_edit = $this->uri->segment(3);
        // var_dump($id_edit);
        $data['rows1'] = $this->PacientModel->county_list();
        $data['rows2'] = $this->PacientModel->locality_list();
        $data['data'] = $this->PacientModel->getData($id_edit);
        $data['row1'] = $this->PacientModel->expose_c($id_edit);
        $data['row2'] = $this->PacientModel->expose_l($id_edit);
        $this->load->view('EditPacientView', $data);
    }

    public function editpatient() {
        $id = $this->input->post('idp');
        $update = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'birth_date' => $this->input->post('birth_date'),
            'address' => $this->input->post('address'),
            'occupation' => $this->input->post('occupation'),
            'job' => $this->input->post('job'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'cnp' => $this->input->post('cnp'),
            'marital_status' => $this->input->post('listm'),
            'id_county' => $this->input->post('listc'),
            'id_locality' => $this->input->post('listl'));

        $this->PacientModel->updatepatient($update, $id);
        echo '<script>alert("Datele sunt modificate!");</script>';
        redirect('/PacientController/details/' . $id, 'refresh');
    }

}
>>>>>>> 14f94083ad2e380dbf480189929230c4f1025500
