<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelurahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelurahan_model');
        $this->load->model('Kecamatan_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kelurahan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kelurahan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kelurahan/index.html';
            $config['first_url'] = base_url() . 'kelurahan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kelurahan_model->total_rows($q);
        $kelurahan = $this->Kelurahan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kelurahan_data' => $kelurahan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Kelurahan');
        $this->template->load('template', 'kelurahan/kelurahan_list', $data);
        // $this->load->view('kelurahan/kelurahan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kelurahan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kelurahan' => $row->id_kelurahan,
		'id_kecamatan' => $row->id_kecamatan,
        'kecamatan' => $row->kecamatan,
		'kelurahan' => $row->kelurahan,
		'kodepos' => $row->kodepos,
	    );
        $this->template->set('title', 'Kelurahan');
        $this->template->load('template', 'kelurahan/kelurahan_read', $data);
            // $this->load->view('kelurahan/kelurahan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelurahan'));
        }
    }

    public function create() 
    {
        $listkec=$this->Kecamatan_model->get_all();
        $kec = array();
        foreach ($listkec as $key => $value){
            $kec[$value->id_kecamatan]=$value->kecamatan;
        }
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('kelurahan/create_action'),
	    'id_kelurahan' => set_value('id_kelurahan'),
	    'id_kecamatan' => set_value('id_kecamatan'),
        'dd_kecamatan' => $kec,
        'dd_current' =>'',
	    'kelurahan' => set_value('kelurahan'),
	    'kodepos' => set_value('kodepos'),
	);
        $this->template->set('title', 'Kelurahan');
        $this->template->load('template', 'kelurahan/kelurahan_form', $data);
        // $this->load->view('kelurahan/kelurahan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kodepos' => $this->input->post('kodepos',TRUE),
	    );

            $this->Kelurahan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kelurahan'));
        }
    }
    
    public function update($id) 
    {
        $listkec=$this->Kecamatan_model->get_all();
        $kec = array();
        foreach ($listkec as $key => $value){
            $kec[$value->id_kecamatan]=$value->kecamatan;
        }
        $row = $this->Kelurahan_model->get_by_id($id);
        $dd_current=$row->id_kecamatan;

        if ($row) {
            
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelurahan/update_action'),
		'id_kelurahan' => set_value('id_kelurahan', $row->id_kelurahan),
		'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
        'dd_kecamatan' => $kec,
        'dd_current' =>$dd_current,
		'kelurahan' => set_value('kelurahan', $row->kelurahan),
		'kodepos' => set_value('kodepos', $row->kodepos),
	    );
        $this->template->set('title', 'Kelurahan');
        $this->template->load('template', 'kelurahan/kelurahan_form', $data);
            // $this->load->view('kelurahan/kelurahan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelurahan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelurahan', TRUE));
        } else {
            $data = array(
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kodepos' => $this->input->post('kodepos',TRUE),
	    );

            $this->Kelurahan_model->update($this->input->post('id_kelurahan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelurahan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kelurahan_model->get_by_id($id);

        if ($row) {
            $this->Kelurahan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelurahan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelurahan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');
	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
	$this->form_validation->set_rules('kodepos', 'kodepos', 'trim|required');

	$this->form_validation->set_rules('id_kelurahan', 'id_kelurahan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kelurahan.php */
/* Location: ./application/controllers/Kelurahan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */