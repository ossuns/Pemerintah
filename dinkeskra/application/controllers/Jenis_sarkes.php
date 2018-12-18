<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_sarkes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_sarkes_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_sarkes/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_sarkes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_sarkes/index.html';
            $config['first_url'] = base_url() . 'jenis_sarkes/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_sarkes_model->total_rows($q);
        $jenis_sarkes = $this->Jenis_sarkes_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_sarkes_data' => $jenis_sarkes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Jenis Sarana Kesehatan');
        $this->template->load('template', 'jenis_sarkes/jenis_sarkes_list', $data);
        // $this->load->view('jenis_sarkes/jenis_sarkes_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_sarkes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_sarkes' => $row->id_jenis_sarkes,
		'jenis_sarkes' => $row->jenis_sarkes,
	    );
        $this->template->set('title', 'Jenis Sarana Kesehatan');
        $this->template->load('template', 'jenis_sarkes/jenis_sarkes_read', $data);
            // $this->load->view('jenis_sarkes/jenis_sarkes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_sarkes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jenis_sarkes/create_action'),
	    'id_jenis_sarkes' => set_value('id_jenis_sarkes'),
	    'jenis_sarkes' => set_value('jenis_sarkes'),
	);
        $this->template->set('title', 'Jenis Sarana Kesehatan');
        $this->template->load('template', 'jenis_sarkes/jenis_sarkes_form', $data);
        // $this->load->view('jenis_sarkes/jenis_sarkes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_sarkes' => $this->input->post('jenis_sarkes',TRUE),
	    );

            $this->Jenis_sarkes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_sarkes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_sarkes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_sarkes/update_action'),
		'id_jenis_sarkes' => set_value('id_jenis_sarkes', $row->id_jenis_sarkes),
		'jenis_sarkes' => set_value('jenis_sarkes', $row->jenis_sarkes),
	    );
        $this->template->set('title', 'Jenis Sarana Kesehatan');
        $this->template->load('template', 'jenis_sarkes/jenis_sarkes_form', $data);
            // $this->load->view('jenis_sarkes/jenis_sarkes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_sarkes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_sarkes', TRUE));
        } else {
            $data = array(
		'jenis_sarkes' => $this->input->post('jenis_sarkes',TRUE),
	    );

            $this->Jenis_sarkes_model->update($this->input->post('id_jenis_sarkes', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_sarkes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_sarkes_model->get_by_id($id);

        if ($row) {
            $this->Jenis_sarkes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_sarkes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_sarkes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_sarkes', 'jenis sarkes', 'trim|required');

	$this->form_validation->set_rules('id_jenis_sarkes', 'id_jenis_sarkes', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_sarkes.php */
/* Location: ./application/controllers/Jenis_sarkes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */