<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kecamatan_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kecamatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kecamatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kecamatan/index.html';
            $config['first_url'] = base_url() . 'kecamatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kecamatan_model->total_rows($q);
        $kecamatan = $this->Kecamatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kecamatan_data' => $kecamatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Kecamatan');
        $this->template->load('template', 'kecamatan/kecamatan_list', $data);
        // $this->load->view('kecamatan/kecamatan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kecamatan' => $row->id_kecamatan,
		'kecamatan' => $row->kecamatan,
	    );
        $this->template->set('title', 'Kecamatan');
        $this->template->load('template', 'kecamatan/kecamatan_read', $data);
            // $this->load->view('kecamatan/kecamatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('kecamatan/create_action'),
	    'id_kecamatan' => set_value('id_kecamatan'),
	    'kecamatan' => set_value('kecamatan'),
	);
        $this->template->set('title', 'Kecamatan');
        $this->template->load('template', 'kecamatan/kecamatan_form', $data);
        // $this->load->view('kecamatan/kecamatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );

            $this->Kecamatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kecamatan/update_action'),
		'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
	    );
        $this->template->set('title', 'Kecamatan');
        $this->template->load('template', 'kecamatan/kecamatan_form', $data);
            // $this->load->view('kecamatan/kecamatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kecamatan', TRUE));
        } else {
            $data = array(
		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );

            $this->Kecamatan_model->update($this->input->post('id_kecamatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);

        if ($row) {
            $this->Kecamatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kecamatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');

	$this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kecamatan.php */
/* Location: ./application/controllers/Kecamatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */