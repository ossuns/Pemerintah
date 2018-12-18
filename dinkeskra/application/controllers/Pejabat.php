<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pejabat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pejabat_model');
          $this->load->library(array('form_validation', 'simple_login'));
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $this->session->set_userdata("limit", $q);
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pejabat?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pejabat?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pejabat';
            $config['first_url'] = base_url() . 'pejabat';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pejabat_model->total_rows($q);
        $pejabat = $this->Pejabat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pejabat_data' => $pejabat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Data Pejabat');
        $this->template->load('template', 'pejabat/pejabat_list', $data);
       /* $this->load->view('pejabat/pejabat_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Pejabat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pejabat' => $row->id_pejabat,
		'nama_pejabat' => $row->nama_pejabat,
		'pangkat' => $row->pangkat,
		'jabatan' => $row->jabatan,
		'nip' => $row->nip,
        'status'=> $row->status,
	    );
            $this->template->set('title', 'Data Pejabat');
            $this->template->load('template', 'pejabat/pejabat_read', $data);
            /*$this->load->view('pejabat/pejabat_read', $data);*/
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pejabat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pejabat/create_action'),
	    'id_pejabat' => set_value('id_pejabat'),
	    'nama_pejabat' => set_value('nama_pejabat'),
	    'pangkat' => set_value('pangkat'),
	    'jabatan' => set_value('jabatan'),
	    'nip' => set_value('nip'),
        'status' => set_value('status'),
	);
        $this->template->set('title', 'Data Pejabat');
        $this->template->load('template', 'pejabat/pejabat_form', $data);
       /* $this->load->view('pejabat/pejabat_form', $data);*/
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pejabat' => $this->input->post('nama_pejabat',TRUE),
		'pangkat' => $this->input->post('pangkat',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'nip' => $this->input->post('nip',TRUE),
        'status' => $this->input->post('status',TRUE),
	    );

            if ($this->input->post('status',TRUE) == 'aktif')
                {
                    $this->Pejabat_model->update_status();
                }

            $this->Pejabat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pejabat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pejabat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pejabat/update_action'),
		'id_pejabat' => set_value('id_pejabat', $row->id_pejabat),
		'nama_pejabat' => set_value('nama_pejabat', $row->nama_pejabat),
		'pangkat' => set_value('pangkat', $row->pangkat),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'nip' => set_value('nip', $row->nip),
        'status' => set_value('status', $row->status),
	    );
            $this->template->set('title', 'Data Pejabat');
            $this->template->load('template', 'pejabat/pejabat_form', $data);
           /* $this->load->view('pejabat/pejabat_form', $data);*/
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pejabat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pejabat', TRUE));
        } else {
            $data = array(
		'nama_pejabat' => $this->input->post('nama_pejabat',TRUE),
		'pangkat' => $this->input->post('pangkat',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'nip' => $this->input->post('nip',TRUE),
        'status' => $this->input->post('status',TRUE),
	    );

            if ($this->input->post('status',TRUE) == 'aktif')
                {
                    $this->Pejabat_model->update_status();
                }
            
            $this->Pejabat_model->update($this->input->post('id_pejabat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pejabat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pejabat_model->get_by_id($id);

        if ($row) {
            $this->Pejabat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pejabat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pejabat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pejabat', 'nama pejabat', 'trim|required');
	$this->form_validation->set_rules('pangkat', 'pangkat', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim');
	$this->form_validation->set_rules('id_pejabat', 'id_pejabat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pejabat.xls";
        $judul = "pejabat";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pejabat");
	xlsWriteLabel($tablehead, $kolomhead++, "Pangkat");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Pejabat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pejabat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pangkat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
        xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pejabat.doc");

        $data = array(
            'pejabat_data' => $this->Pejabat_model->get_filtered_data(),
            'start' => 0
        );
        
        $this->load->view('pejabat/pejabat_doc',$data);
    }

}