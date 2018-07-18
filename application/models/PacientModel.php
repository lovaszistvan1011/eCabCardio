<?php

class PacientModel extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->helper('url');
    }

    public function record_count() {

        return $this->db->count_all("patient");
    }

    public function fetch_departments($limit, $start, $keyword) {

        $this->db->limit($limit, $start);
        $this->db->or_like(array('first_name' => $keyword, 'last_name' => $keyword, 'cnp' => $keyword));
        $query = $this->db->get("patient");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function search($keyword) {
        $this->db->or_like(array('first_name' => $keyword, 'last_name' => $keyword, 'cnp' => $keyword));
        $query = $this->db->get('patient');
        return $query->result();
    }

    function county_list() {
        $query = $this->db->get('county');
        return $query->result();
    }

    function locality_list() {
        $query = $this->db->get('locality');
        return $query->result();
    }

    function expose_c($id_patient) {
        $query = $this->db->query("SELECT county.name from county INNER JOIN patient on county.id_county = patient.id_county WHERE patient.id_patient = '$id_patient' ");
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    function expose_l($id_patient) {
        $query = $this->db->query("SELECT locality.name from locality INNER JOIN patient on locality.id_locality= patient.id_locality WHERE patient.id_patient = '$id_patient' ");
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }


    public function getData($id) {
        $this->db->where('id_patient', $id);
        $query = $this->db->get('patient');
        return $query->result();
    }

    public function form_insert($array) { {
            $this->db->insert('patient', $array);
            $idOfInsertedData = $this->db->insert_id();
        }
        return $idOfInsertedData;
    }

    public function updatepatient($array, $id) { {
            $this->db->where('id_patient', $id);
            $this->db->update('patient', $array);
            return true;
        }
    }

}
