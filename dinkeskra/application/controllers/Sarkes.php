<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sarkes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sarkes_model');
        $this->load->model('Jenis_sarkes_model');
        $this->load->model('Kecamatan_model');
        $this->load->model('Kelurahan_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sarkes/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sarkes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sarkes/index.html';
            $config['first_url'] = base_url() . 'sarkes/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sarkes_model->total_rows($q);
        $sarkes = $this->Sarkes_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sarkes_data' => $sarkes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Sarana Kesehatan');
        $this->template->load('template', 'sarkes/sarkes_list', $data);
        // $this->load->view('sarkes/sarkes_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sarkes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sarkes' => $row->id_sarkes,
		'id_jenis_sarkes' => $row->id_jenis_sarkes,
        'jenis_sarkes' => $row->jenis_sarkes,
		'id_kecamatan' => $row->id_kecamatan,
        'kecamatan' => $row->kecamatan,
		'id_kelurahan' => $row->id_kelurahan,
        'kelurahan' => $row->kelurahan,
		'sarkes' => $row->sarkes,
		'alamat_sarkes' => $row->alamat_sarkes,
	    );
        $this->template->set('title', 'Sarana Kesehatan');
        $this->template->load('template', 'sarkes/sarkes_read', $data);
            // $this->load->view('sarkes/sarkes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sarkes'));
        }
    }

    public function create() 
    {
        $listjen=$this->Jenis_sarkes_model->get_all();
        $jen = array();
        foreach ($listjen as $key => $value){
            $jen[$value->id_jenis_sarkes]=$value->jenis_sarkes;
        }
        $listkec=$this->Kecamatan_model->get_all();
        $kec = array();
        foreach ($listkec as $key => $value){
            $kec[$value->id_kecamatan]=$value->kecamatan;
        }

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('sarkes/create_action'),
	    'id_sarkes' => set_value('id_sarkes'),
	    'id_jenis_sarkes' => set_value('id_jenis_sarkes'),
        'dd_jenis' => $jen,
        'jj_current' =>'',
	    'id_kecamatan' => set_value('id_kecamatan'),
        'dd_kec' => $kec,
        'cc_current' =>'',
        'll_current' =>'',
	    'sarkes' => set_value('sarkes'),
	    'alamat_sarkes' => set_value('alamat_sarkes'),
	);
        $this->template->set('title', 'Sarana Kesehatan');
        $this->template->load('template', 'sarkes/sarkes_form', $data);
        // $this->load->view('sarkes/sarkes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenis_sarkes' => $this->input->post('id_jenis_sarkes',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'id_kelurahan' => $this->input->post('id_kelurahan',TRUE),
		'sarkes' => $this->input->post('sarkes',TRUE),
		'alamat_sarkes' => $this->input->post('alamat_sarkes',TRUE),
	    );

            $this->Sarkes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sarkes'));
        }
    }
    
    public function update($id) 
    {
        $listjen=$this->Jenis_sarkes_model->get_all();
        $jen = array();
        foreach ($listjen as $key => $value){
            $jen[$value->id_jenis_sarkes]=$value->jenis_sarkes;
        }
        $listkec=$this->Kecamatan_model->get_all();
        $kec = array();
        foreach ($listkec as $key => $value){
            $kec[$value->id_kecamatan]=$value->kecamatan;
        }
        $row = $this->Sarkes_model->get_by_id($id);
        $jj_current=$row->id_jenis_sarkes;
        $cc_current=$row->id_kecamatan;
        $ll_current=$row->id_kelurahan;
        $listkel=$this->Kelurahan_model->getbyid($row->id_kelurahan);
        $kel = array();
        foreach ($listkel as $key => $value){
            $kel[$value->id_kelurahan]=$value->kelurahan;
        }

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sarkes/update_action'),
		'id_sarkes' => set_value('id_sarkes', $row->id_sarkes),
		'id_jenis_sarkes' => set_value('id_jenis_sarkes', $row->id_jenis_sarkes),
        'dd_jenis' => $jen,
        'jj_current' =>$jj_current,
		'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
        'dd_kec' => $kec,
        'cc_current' =>$cc_current,
		'id_kelurahan' => set_value('id_kelurahan', $row->id_kelurahan),
        'dd_kel' => $kel,
        'll_current' =>$ll_current,
		'sarkes' => set_value('sarkes', $row->sarkes),
		'alamat_sarkes' => set_value('alamat_sarkes', $row->alamat_sarkes),
	    );
        $this->template->set('title', 'Sarana Kesehatan');
        $this->template->load('template', 'sarkes/sarkes_form', $data);
            // $this->load->view('sarkes/sarkes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sarkes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sarkes', TRUE));
        } else {
            $data = array(
		'id_jenis_sarkes' => $this->input->post('id_jenis_sarkes',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'id_kelurahan' => $this->input->post('id_kelurahan',TRUE),
		'sarkes' => $this->input->post('sarkes',TRUE),
		'alamat_sarkes' => $this->input->post('alamat_sarkes',TRUE),
	    );

            $this->Sarkes_model->update($this->input->post('id_sarkes', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sarkes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sarkes_model->get_by_id($id);

        if ($row) {
            $this->Sarkes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sarkes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sarkes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenis_sarkes', 'id jenis sarkes', 'trim|required');
	$this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');
	$this->form_validation->set_rules('id_kelurahan', 'id kelurahan', 'trim|required');
	$this->form_validation->set_rules('sarkes', 'sarkes', 'trim|required');
	$this->form_validation->set_rules('alamat_sarkes', 'alamat_sarkes', 'trim|required');

	$this->form_validation->set_rules('id_sarkes', 'id_sarkes', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function data_kecamatan()
 {
  if($this->input->get('id'))
  {
   echo $this->Sarkes_model->data_kecamatan($this->input->get('id'));
  }
 }

}

/* End of file Sarkes.php */
/* Location: ./application/controllers/Sarkes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */