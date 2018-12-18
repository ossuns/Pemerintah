<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_dasar_sip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_dasar_sip_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_dasar_sip/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_dasar_sip/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_dasar_sip/index.html';
            $config['first_url'] = base_url() . 'jenis_dasar_sip/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_dasar_sip_model->total_rows($q);
        $jenis_dasar_sip = $this->Jenis_dasar_sip_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_dasar_sip_data' => $jenis_dasar_sip,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Jenis Dasar SIP');
        $this->template->load('template', 'jenis_dasar_sip/jenis_dasar_sip_list', $data);
        // $this->load->view('jenis_dasar_sip/jenis_dasar_sip_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenis_dasar_sip_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_dasar_sip' => $row->id_jenis_dasar_sip,
		'jenis_dasar_sip' => $row->jenis_dasar_sip,
	    );
            $this->template->set('title', 'Jenis Dasar SIP');
            $this->template->load('template', 'jenis_dasar_sip/jenis_dasar_sip_read', $data);
            // $this->load->view('jenis_dasar_sip/jenis_dasar_sip_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dasar_sip'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jenis_dasar_sip/create_action'),
	    'id_jenis_dasar_sip' => set_value('id_jenis_dasar_sip'),
	    'jenis_dasar_sip' => set_value('jenis_dasar_sip'),
	);
        $this->template->set('title', 'Jenis Dasar SIP');
        $this->template->load('template', 'jenis_dasar_sip/jenis_dasar_sip_form', $data);
        // $this->load->view('jenis_dasar_sip/jenis_dasar_sip_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_dasar_sip' => $this->input->post('jenis_dasar_sip',TRUE),
	    );

            $this->Jenis_dasar_sip_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_dasar_sip'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_dasar_sip_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_dasar_sip/update_action'),
		'id_jenis_dasar_sip' => set_value('id_jenis_dasar_sip', $row->id_jenis_dasar_sip),
		'jenis_dasar_sip' => set_value('jenis_dasar_sip', $row->jenis_dasar_sip),
	    );
            $this->template->set('title', 'Jenis Dasar SIP');
            $this->template->load('template', 'jenis_dasar_sip/jenis_dasar_sip_form', $data);
            // $this->load->view('jenis_dasar_sip/jenis_dasar_sip_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dasar_sip'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_dasar_sip', TRUE));
        } else {
            $data = array(
		'jenis_dasar_sip' => $this->input->post('jenis_dasar_sip',TRUE),
	    );

            $this->Jenis_dasar_sip_model->update($this->input->post('id_jenis_dasar_sip', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_dasar_sip'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_dasar_sip_model->get_by_id($id);

        if ($row) {
            $this->Jenis_dasar_sip_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_dasar_sip'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dasar_sip'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_dasar_sip', 'jenis dasar sip', 'trim|required');

	$this->form_validation->set_rules('id_jenis_dasar_sip', 'id_jenis_dasar_sip', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_dasar_sip.php */
/* Location: ./application/controllers/Jenis_dasar_sip.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */