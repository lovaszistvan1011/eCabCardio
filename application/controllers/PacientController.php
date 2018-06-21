<?php

class PacientController extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->helper(array('form', 'url'));

    $this->load->model('PacientModel');
    $this->load->library('pagination');
  }

  function index() {
    $this->load->view('search');
  }

  public function design() {
    $data = array(
        'title' => 'Caută pacient',
    );
    $this->load->library('template');
    $this->template->load('Plain', 'search_design', $data);
  }

  public function search_keyword() {
    $config = array();
    $config["base_url"] = base_url() . "PacientController/search_keyword";
    $config["total_rows"] = $this->PacientModel->record_count();
    $config["per_page"] = 2;
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
    $this->load->view('PacientView', $data);
  }

  public function insert_data() {
    $data['rows1'] = $this->PacientModel->expose_c();
    $data['rows2'] = $this->PacientModel->expose_l();
    $data['rows3'] = $this->PacientModel->expose_m();
    $this->load->view('NewPacientView', $data);
  }

  public function listP() {
    $id_p = $this->uri->segment(3);
    $data['rows'] = $this->PacientModel->getData($id_p);
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

  public function savedata() {
    $id_c = $this->input->post('listp');
    $id_county = $this->PacientModel->get_idc($id_c);

    $id_l = $this->input->post('listl');
    $id_locality = $this->PacientModel->get_idl($id_l);

    if (!empty($_POST)) {
      $save[] = array(
          'first_name' => $this->input->post('first_name'),
          'last_name' => $this->input->post('last_name'),
          'birth_date' => $this->input->post('birth_date'),
          'address' => $this->input->post('address'),
          'occupation' => $this->input->post('occupation'),
          'job' => $this->input->post('job'),
          'phone' => $this->input->post('phone'),
          'email' => $this->input->post('email'),
          'cnp' => $this->input->post('cnp'),
          'marital_status' => $this->input->post('marital_status'),
          'id_county' => $id_county,
          'id_locality' => $id_locality);


      $this->PacientModel->form_insert($save);
      //redirect('patient/index');
    }
  }

}
