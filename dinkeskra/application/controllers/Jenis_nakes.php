<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_nakes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_nakes_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_nakes/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_nakes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_nakes/index.html';
            $config['first_url'] = base_url() . 'jenis_nakes/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_nakes_model->total_rows($q);
        $jenis_nakes = $this->Jenis_nakes_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_nakes_data' => $jenis_nakes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Jenis Tenaga Kesehatan');
        $this->template->load('template', 'jenis_nakes/jenis_nakes_list', $data);
        // $this->load->view('jenis_nakes/jenis_nakes_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_nakes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_nakes' => $row->id_jenis_nakes,
		'jenis_nakes' => $row->jenis_nakes,
		'singkatan' => $row->singkatan,
		'max_sip' => $row->max_sip,
	    );
        $this->template->set('title', 'Jenis Tenaga Kesehatan');
        $this->template->load('template', 'jenis_nakes/jenis_nakes_read', $data);
            // $this->load->view('jenis_nakes/jenis_nakes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_nakes'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jenis_nakes/create_action'),
	    'id_jenis_nakes' => set_value('id_jenis_nakes'),
	    'jenis_nakes' => set_value('jenis_nakes'),
	    'singkatan' => set_value('singkatan'),
	    'max_sip' => set_value('max_sip'),
	);
        $this->template->set('title', 'Jenis Tenaga Kesehatan');
        $this->template->load('template', 'jenis_nakes/jenis_nakes_form', $data);
        // $this->load->view('jenis_nakes/jenis_nakes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_nakes' => $this->input->post('jenis_nakes',TRUE),
		'singkatan' => $this->input->post('singkatan',TRUE),
		'max_sip' => $this->input->post('max_sip',TRUE),
	    );

            $this->Jenis_nakes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_nakes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_nakes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_nakes/update_action'),
		'id_jenis_nakes' => set_value('id_jenis_nakes', $row->id_jenis_nakes),
		'jenis_nakes' => set_value('jenis_nakes', $row->jenis_nakes),
		'singkatan' => set_value('singkatan', $row->singkatan),
		'max_sip' => set_value('max_sip', $row->max_sip),
	    );
        $this->template->set('title', 'Jenis Tenaga Kesehatan');
        $this->template->load('template', 'jenis_nakes/jenis_nakes_form', $data);
            // $this->load->view('jenis_nakes/jenis_nakes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_nakes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_nakes', TRUE));
        } else {
            $data = array(
		'jenis_nakes' => $this->input->post('jenis_nakes',TRUE),
		'singkatan' => $this->input->post('singkatan',TRUE),
		'max_sip' => $this->input->post('max_sip',TRUE),
	    );

            $this->Jenis_nakes_model->update($this->input->post('id_jenis_nakes', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_nakes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_nakes_model->get_by_id($id);

        if ($row) {
            $this->Jenis_nakes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_nakes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_nakes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_nakes', 'jenis nakes', 'trim|required');
	$this->form_validation->set_rules('singkatan', 'singkatan', 'trim|required');
	$this->form_validation->set_rules('max_sip', 'max sip', 'trim|required');

	$this->form_validation->set_rules('id_jenis_nakes', 'id_jenis_nakes', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_nakes.php */
/* Location: ./application/controllers/Jenis_nakes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */