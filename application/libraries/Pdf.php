<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

/**
 * Description of Pdf
 *
 * @author stefa
 */
class Pdf extends TCPDF {

  public $clinic, $employee;

  function __construct($clinic = null, $employee = null, $letter = null) {
    parent::__construct();
  }

  //Page header
  public function Header() {
    $this->SetFillColor(255, 225, 225);
    if ($this->page === 1) {
//      Populateing CLINIC data
      $image_file = base_url() . 'appearance/images/' . $this->clinic['logo'];
      $this->Image($image_file, 50, 2, 13, 13, 'PNG', '', 'M', true, 300, '', false, false, 0, false, false, false);
      $this->SetFont('dejavusans', '', 12);
      $this->MultiCell(90, 5, $this->clinic['address'] . ' | ' . $this->clinic['phone'], 0, 'C', 0, FALSE, 11, 15);
      $this->MultiCell(90, 5, $this->clinic['email'] . ' | ' . $this->clinic['www'], 0, 'C', 0, FALSE, 11, 20);

//    Populateing Employee details
      $this->MultiCell(40, 5, 'Cabinet medical:', 0, 'R', '', FALSE, 98, 6);
      $this->MultiCell(55, 5, $this->clinic['name'], 1, 'C', 1, FALSE, 139, 6);
      $this->MultiCell(40, 5, 'Medic:', 0, 'R', '', FALSE, 98, 14);
      $this->MultiCell(55, 5, $this->employee['first_name'] . ' ' . $this->employee['last_name'], 1, 'C', 1, FALSE, 139, 14);
      $this->MultiCell(40, 5, 'Specialitate:', 0, 'R', '', FALSE, 98, 22);
      $this->MultiCell(55, 5, $this->employee['title'], 1, 'C', 1, FALSE, 139, 22);
    }
  }

  // Page footer
  public function Footer() {
    // Position at 15 mm from bottom
    $this->SetY(-13);
    $this->SetFont('dejavuserif', 'I', 11);
    // Page number
    $this->Cell(0, 10, 'Pagina ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, 0, 0, false, 'T', 'M');
  }

}
