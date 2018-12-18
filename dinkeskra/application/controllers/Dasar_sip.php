<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dasar_sip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dasar_sip_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') 
        {
            $config['base_url'] = base_url() . 'dasar_sip/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dasar_sip/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dasar_sip/index.html';
            $config['first_url'] = base_url() . 'dasar_sip/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dasar_sip_model->total_rows($q);
        $dasar_sip = $this->Dasar_sip_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dasar_sip_data' => $dasar_sip,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('dasar_sip/dasar_sip_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Dasar_sip_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dasar_sip' => $row->id_dasar_sip,
		'id_jenis_dasar_sip' => $row->id_jenis_dasar_sip,
		'id_nakes' => $row->id_nakes,
		'masa_berlaku' => $row->masa_berlaku,
	    );
            $this->load->view('dasar_sip/dasar_sip_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dasar_sip'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dasar_sip/create_action'),
	    'id_dasar_sip' => set_value('id_dasar_sip'),
	    'id_jenis_dasar_sip' => set_value('id_jenis_dasar_sip'),
	    'id_nakes' => set_value('id_nakes'),
	    'masa_berlaku' => set_value('masa_berlaku'),
	);
        $this->load->view('dasar_sip/dasar_sip_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenis_dasar_sip' => $this->input->post('id_jenis_dasar_sip',TRUE),
		'id_nakes' => $this->input->post('id_nakes',TRUE),
		'masa_berlaku' => $this->input->post('masa_berlaku',TRUE),
	    );

            $this->Dasar_sip_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dasar_sip'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dasar_sip_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dasar_sip/update_action'),
		'id_dasar_sip' => set_value('id_dasar_sip', $row->id_dasar_sip),
		'id_jenis_dasar_sip' => set_value('id_jenis_dasar_sip', $row->id_jenis_dasar_sip),
		'id_nakes' => set_value('id_nakes', $row->id_nakes),
		'masa_berlaku' => set_value('masa_berlaku', $row->masa_berlaku),
	    );
            $this->load->view('dasar_sip/dasar_sip_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dasar_sip'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dasar_sip', TRUE));
        } else {
            $data = array(
		'id_jenis_dasar_sip' => $this->input->post('id_jenis_dasar_sip',TRUE),
		'id_nakes' => $this->input->post('id_nakes',TRUE),
		'masa_berlaku' => $this->input->post('masa_berlaku',TRUE),
	    );

            $this->Dasar_sip_model->update($this->input->post('id_dasar_sip', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dasar_sip'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dasar_sip_model->get_by_id($id);

        if ($row) {
            $this->Dasar_sip_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dasar_sip'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dasar_sip'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenis_dasar_sip', 'id jenis dasar sip', 'trim|required');
	$this->form_validation->set_rules('id_nakes', 'id nakes', 'trim|required');
	$this->form_validation->set_rules('masa_berlaku', 'masa berlaku', 'trim|required');

	$this->form_validation->set_rules('id_dasar_sip', 'id_dasar_sip', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dasar_sip.php */
/* Location: ./application/controllers/Dasar_sip.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */