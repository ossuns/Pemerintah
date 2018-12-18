<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nakes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nakes_model');
        $this->load->model('Sip_model');
        $this->load->model('Jenis_nakes_model');
        // $this->load->model('Dasar_sip_model');
        // $this->load->model('Jenis_dasar_sip_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nakes/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nakes/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nakes/index.html';
            $config['first_url'] = base_url() . 'nakes/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Nakes_model->total_rows($q);
        // $nakes = $this->Nakes_model->get_limit_data($config['per_page'], $start, $q);
        $filter = $this->input->get('filter');
        if ($filter) {
            $nakes = $this->Nakes_model->get_data_filter($filter);
        }else{
            $nakes = $this->Nakes_model->get_limit_data($config['per_page'], $start, $q);
        }
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jennakes_data' => $this->Jenis_nakes_model->get_all(),
            'nakes_data' => $nakes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            // 'dropdown' => $this->Nakes_model->dropdown(),
        );


        $this->template->set('title', 'Data Dokter');
        $this->template->load('template', 'nakes/nakes_list', $data);
        // $this->load->view('nakes/nakes_list', $data);
    }

    private function _kadaluarsa($id)
    {
        $this->load->helper('date');
        $masa_berlaku = $this->Nakes_model->get_by_id1($id)['masa_berlaku'];

        if (($masa_berlaku >= date("Y-m-d") && diff_date(date("Y-m-d"), $masa_berlaku)>180) OR
            ($masa_berlaku >= date("Y-m-d") && diff_date(date("Y-m-d"), $masa_berlaku)<=180 )) {
            return false;
        }else{
            return true;
        }
    }

    public function read($id) 
    {
        $data['kadaluarsa'] = $this->_kadaluarsa($id);
        $this->load->helper('date');
        $row = $this->Nakes_model->get_by_id1($id);

        if (true) {
            $data['data'] = $row;
            $data['sip'] = $this->Sip_model->get_sip_by_nakes($id);

            
            $this->template->set('title', 'Data Dokter');
            $this->template->load('template', 'nakes/nakes_read', $data);

            // $this->load->view('nakes/nakes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nakes'));
        }
    }

    public function create() 
    {
        $listnakes=$this->Jenis_nakes_model->get_all();
        $jenisnakes = array();
        foreach ($listnakes as $key => $value){
            $jenisnakes[$value->id_jenis_nakes]=$value->jenis_nakes;
        }
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('nakes/create_action'),
	    'id_nakes' => set_value('id_nakes'),
	    'id_jenis_nakes' => set_value('id_jenis_nakes'),
        'dd_jenisnakes' => $jenisnakes,
        'dd_current' =>'',
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'jk' => set_value('jk'),
	    'telp' => set_value('telp'),
	    'alamat' => set_value('alamat'),
	    'tmp_lahir' => set_value('tmp_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
        'no_str' => set_value('no_str'),
        'masa_berlaku' => set_value('masa_berlaku'),
	);
        $this->template->set('title', 'Data Dokter');
        $this->template->load('template', 'nakes/nakes_form', $data);
        // $this->load->view('nakes/nakes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenis_nakes' => $this->input->post('id_jenis_nakes',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
        'no_str' => $this->input->post('no_str',TRUE),
        'masa_berlaku' => $this->input->post('masa_berlaku',TRUE),
	    );

            $this->Nakes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nakes'));
        }
    }
    
    public function update($id) 
    {
        $listnakes=$this->Jenis_nakes_model->get_all();
        $jenisnakes = array();
        foreach ($listnakes as $key => $value){
            $jenisnakes[$value->id_jenis_nakes]=$value->jenis_nakes;
        }
        $row = $this->Nakes_model->get_by_id2($id);
        $dd_current=$row->id_jenis_nakes;

        if ($row) {
            
            $data = array(
                'button' => 'Update',
                'action' => site_url('nakes/update_action'),
		'id_nakes' => set_value('id_nakes', $row->id_nakes),
		'id_jenis_nakes' => set_value('id_jenis_nakes', $row->id_jenis_nakes),
        'dd_jenisnakes' => $jenisnakes,
        'dd_current' =>$dd_current,
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'jk' => set_value('jk', $row->jk),
		'telp' => set_value('telp', $row->telp),
		'alamat' => set_value('alamat', $row->alamat),
		'tmp_lahir' => set_value('tmp_lahir', $row->tmp_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
        'no_str' => set_value('no_str', $row->no_str),
        'masa_berlaku' => set_value('masa_berlaku', $row->masa_berlaku),
	    );
        $this->template->set('title', 'Data Dokter');
        $this->template->load('template', 'nakes/nakes_form', $data);
            // $this->load->view('nakes/nakes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            //redirect(site_url('nakes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nakes', TRUE));
        } else {
            $data = array(
		'id_jenis_nakes' => $this->input->post('id_jenis_nakes',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
        'no_str' => $this->input->post('no_str',TRUE),
        'masa_berlaku' => $this->input->post('masa_berlaku',TRUE),
	    );

            $this->Nakes_model->update($this->input->post('id_nakes', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nakes'));
        }
    }
    
    public function delete($id) 
    {
        // $row = $this->Nakes_model->get_by_id($id);

        // print_r($row);
        // if ($row) {
        $this->Nakes_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('nakes'));
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenis_nakes', 'id jenis nakes', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	// $this->form_validation->set_rules('jk', 'jk', 'trim|required');
	// $this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tmp_lahir', 'tmp lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
    $this->form_validation->set_rules('no_str', 'no str', 'trim|required');
    $this->form_validation->set_rules('masa_berlaku', 'masa berlaku', 'trim|required');
    //$this->form_validation->set_rules('jml_sip_aktif', 'jml sip aktif', 'trim|required');

	$this->form_validation->set_rules('id_nakes', 'id_nakes', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $jenis=$this->input->post('id_jenis_nakes');
        $id_nakes = $this->Nakes_model->get_by_id_jenis($jenis);
        // echo "<pre>";
        // print_r($id_nakes);
        // echo "</pre>";
        $this->load->helper('exportexcel');
        $namaFile = "nakes.xls";
        $judul = "nakes";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Tmp Lahir");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
    	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "No STR");
        xlsWriteLabel($tablehead, $kolomhead++, "Masa Berlaku");
        //xlsWriteLabel($tablehead, $kolomhead++, "Jml SIP Aktif");

    	foreach ($id_nakes as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->tmp_lahir);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_str);
            xlsWriteLabel($tablebody, $kolombody++, $data->masa_berlaku);
            //xlsWriteLabel($tablebody, $kolombody++, $data->jml_sip_aktif);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=nakes.doc");

        $data = array(
            'nakes_data' => $this->Nakes_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('nakes/nakes_doc',$data);
    }

}

/* End of file Nakes.php */
/* Location: ./application/controllers/Nakes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 04:00:09 */
/* http://harviacode.com */