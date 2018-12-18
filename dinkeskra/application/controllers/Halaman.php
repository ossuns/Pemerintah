<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Halaman extends CI_Controller{

	 function __construct()
    {
        parent::__construct();
        $this->load->model('Halaman_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
        
    }


 
  function index()
  {
    // $kadaluarsa = $this->Halaman_model->get_data_masaberlaku();
  	$data = array(
				'nakes' => $this->Halaman_model->get_all_data(),
				'aktif' => $this->Halaman_model->get_data_by_aktif('Aktif'),
				'blmaktif' => $this->Halaman_model->get_data_by_aktif('Belum Aktif'),
        'count_umum' => $this->Halaman_model->count_dokter(1),
        'count_gigi' => $this->Halaman_model->count_dokter(2),
        'count_spesialis' => $this->Halaman_model->count_dokter(3),
        'masa_berlaku' => $this->Halaman_model->masa_berlaku()
        // 'kd' => $kadaluarsa->jmlh_kadaluarsa,
			);

  	$this->template->set('title', 'Halaman');
	   $this->template->load('template', 'halaman', $data);
  	
    // $this->load->view('halaman');
  }
 
}