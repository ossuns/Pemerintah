<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sip_model');
        $this->load->model('Nakes_model');
        $this->load->model('Jenis_sarkes_model');
        $this->load->model('Sarkes_model');
        $this->load->library('form_validation');
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sip/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sip/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sip/index.html';
            $config['first_url'] = base_url() . 'sip/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sip_model->total_rows($q);
        $sip = $this->Sip_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sip_data' => $sip,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $nakes = $this->Nakes_model->get_list_nama();
        $opt = array('' => 'Nama');
        foreach ($nakes as $win) {
            $opt[$win] = $win;
        }
 
        $data['form_nama'] = form_dropdown('',$opt,'','id="win" class="form-control"');

        $this->template->set('title', 'Data SIP');
        $this->template->load('template', 'sip/sip_list', $data);
        // $this->load->view('sip/sip_list', $data);
    }

    public function listkhusus($id, $nama)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sip/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sip/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sip/index.html';
            $config['first_url'] = base_url() . 'sip/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sip_model->total_rows($q);
        $sip = $this->Sip_model->get_limit_data2($id, $config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
 
        $row = $this->Sip_model->get_by_id($id);
        if ($row) {
        $data = array(
            'sip_data' => $sip,
            'q' => $q,
            'ok'=>$nama,
            'pagination' => $this->pagination->create_links(),
            // 'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','sip/sip_listkhusus', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            $data = array(
            'sip_data' => $sip,
            'q' => $q,
            'ok'=>$nama,
            'pagination' => '',
            // 'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $this->template->load('template','sip/sip_listkhusus', $data);
        }
    }

    public function aktifasi($id)
    {
        $tgl=date('Y-m-d', time());
        $this->Sip_model->aktifasi($id, $tgl);
        redirect(site_url('nakes'));
    }

    public function read($id) 
    {
        $row = $this->Sip_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_sip' => $row->id_sip,
        'id_nakes' => $row->id_nakes,
        'id_jenis_sarkes' => $row->id_jenis_sarkes,
        'id_sarkes' => $row->id_sarkes,
        'no_sip' => $row->no_sip,
        'tanggal_masuk' => $row->tanggal_masuk,
        'tanggal_selesai' => $row->tanggal_selesai,
        'tanggal_terbit' => $row->tanggal_terbit,
        'masa_berlaku' => $row->tanggal_berlaku,
        'status_sip' => $row->status_sip,
        'no_rekomendasi' => $row->no_rekomendasi,
        'no_urut' => $row->no_urut,
        );
        $this->template->set('title', 'Data SIP');
        $this->template->load('template', 'sip/sip_read', $data);
            // $this->load->view('sip/sip_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sip'));
        }
    }

    public function create($id_nakes) 
    {
        $listnakes=$this->Nakes_model->get_all();
        $nakes = array();
        foreach ($listnakes as $key => $value){
            $nakes[$value->id_nakes]=$value->nama;
        }

        $nakes_row = $this->Nakes_model->get_by_id2($id_nakes);
        $listjensar=$this->Jenis_sarkes_model->get_all();
        $jensar = array();
        foreach ($listjensar as $key => $value){
            $jensar[$value->id_jenis_sarkes]=$value->jenis_sarkes;
        }
        $listsarkes=$this->Sarkes_model->get_all();
        $sarkes = array();
        foreach ($listsarkes as $key => $value){
            $sarkes[$value->id_jenis_sarkes]=$value->sarkes;
        }
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('sip/create_action'),
        'id_sip' => set_value('id_sip'),
        'id_nakes' => $nakes_row->id_nakes,
        'nn_nakes' => $nakes,
        'nn_current' =>'',
        'id_jenis_sarkes' => set_value('id_jenis_sarkes'),
        'jj_jensar' => $jensar,
        'jj_current' =>'',
        'id_sarkes' => '',
        'ss_sarkes' => $sarkes,
        // 'ss_sarkes' => $listsarkes,
        'ss_current' =>'',
        'no_sip' => set_value('no_sip'),
        'tanggal_masuk' => set_value('tanggal_masuk'),
        'tanggal_selesai' => set_value('tanggal_selesai'),
        'tanggal_terbit' => set_value('tanggal_terbit'),
        'tanggal_berlaku' => set_value('tanggal_berlaku'),
        'no_rekomendasi' => set_value('no_rekomendasi'),

        'no_urut' => set_value('no_urut'),
        'nama_dokter' => $nakes_row->nama,
        'masa_berlaku' => $nakes_row->masa_berlaku,

    );
        $this->template->set('title', 'Data SIP');
        $this->template->load('template', 'sip/sip_form', $data);
        // $this->load->view('sip/sip_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_nakes' => $this->input->post('id_nakes',TRUE),
        'id_jenis_sarkes' => $this->input->post('id_jenis_sarkes',TRUE),
        'id_sarkes' => $this->input->post('id_sarkes',TRUE),
        'no_sip' => $this->input->post('no_sip',TRUE),
        'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
        'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
        'tanggal_terbit' => $this->input->post('tanggal_terbit',TRUE),
        'tanggal_berlaku' => $this->input->post('tanggal_berlaku',TRUE),
        'no_rekomendasi' => $this->input->post('no_rekomendasi',TRUE),
        'no_urut' => $this->input->post('no_urut',TRUE),
        );

            $this->Sip_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nakes/read/'.$this->input->post('id',TRUE)));
        }
    }
    
    public function update($id) 
    {
        $listnakes=$this->Nakes_model->get_all();
        $nakes = array();
        foreach ($listnakes as $key => $value){
            $nakes[$value->id_nakes]=$value->nama;
        }

        $nakes_row = $this->Nakes_model->get_by_id2($id);

        $listjensar=$this->Jenis_sarkes_model->get_all();
        $jensar = array();
        foreach ($listjensar as $key => $value){
            $jensar[$value->id_jenis_sarkes]=$value->jenis_sarkes;
        }
        $listsarkes=$this->Sarkes_model->get_all();
        $sarkes = array();
        foreach ($listsarkes as $key => $value){
            $sarkes[$value->id_sarkes]=$value->sarkes;
        }
        $row = $this->Sip_model->get_by_id($id);
        $nn_current=$row->id_nakes;
        $jj_current=$row->id_jenis_sarkes;
        $ss_current=$row->id_sarkes;

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sip/update_action'),
        'id_sip' => set_value('id_sip', $row->id_sip),
        'id_nakes' => set_value('id_nakes', $row->id_nakes),
        'nn_nakes' => $nakes,
        'nn_current' =>$nn_current,
        'id_jenis_sarkes' => set_value('id_jenis_sarkes', $row->id_jenis_sarkes),
        'jj_jensar' => $jensar,
        'jj_current' =>$jj_current,
        'id_sarkes' => set_value('id_sarkes', $row->id_sarkes),
        'ss_sarkes' => $sarkes,
        'ss_current' =>$ss_current,
        'no_sip' => set_value('no_sip', $row->no_sip),
        'tanggal_masuk' => set_value('tanggal_masuk', $row->tanggal_masuk),
        'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
        'tanggal_terbit' => set_value('tanggal_terbit', $row->tanggal_terbit),
        'tanggal_berlaku' => set_value('tanggal_berlaku', $row->tanggal_berlaku),
        'no_rekomendasi' => set_value('no_rekomendasi', $row->no_rekomendasi),
        'no_urut' => set_value('no_urut', $row->no_urut),
        'nama_dokter' => set_value('nama', $row->nama),
        'masa_berlaku' => $nakes_row->masa_berlaku,

        );
        $this->template->set('title', 'Data SIP');
        $this->template->load('template', 'sip/sip_form', $data);
            // $this->load->view('sip/sip_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sip'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sip', TRUE));
        } else {
            $data = array(
        'id_nakes' => $this->input->post('id_nakes',TRUE),
        'id_jenis_sarkes' => $this->input->post('id_jenis_sarkes',TRUE),
        'id_sarkes' => $this->input->post('id_sarkes',TRUE),
        'no_sip' => $this->input->post('no_sip',TRUE),
        'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
        'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
        'tanggal_terbit' => $this->input->post('tanggal_terbit',TRUE),
        'tanggal_berlaku' => $this->input->post('tanggal_berlaku',TRUE),
        'no_rekomendasi' => $this->input->post('no_rekomendasi',TRUE),
        'no_urut' => $this->input->post('no_urut',TRUE),
        );

            $this->Sip_model->update($this->input->post('id_sip', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sip'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sip_model->get_by_id($id);

        if ($row) {
            $this->Sip_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sip'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sip'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('id_sarkes', 'id sarkes', 'trim|required');
    $this->form_validation->set_rules('no_sip', 'no sip', 'trim|required');
    $this->form_validation->set_rules('no_rekomendasi', 'No Rekomendasi', 'trim|required');
    $this->form_validation->set_rules('no_urut', 'No Urut', 'trim|required');

    $this->form_validation->set_rules('id_sip', 'id_sip', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function data_sarkes()
    {
        if($this->input->get('id'))
        {
            echo $this->Sip_model->data_sarkes($this->input->get('id'));
        }
    }

    public function data_filter()
    {
        // $list = $this->Sip_model->count_filtered();
        // echo json_encode($list);
        // /*

        $list = $this->Sip_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sips) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $sips->no_sip;
            $row[] = $sips->nama;
            $row[] = $sips->no_str;
            $row[] = $sips->masa_berlaku;
            $row[] = $sips->sarkes;
 
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Sip_model->count_all(),
                        "recordsFiltered" => $this->Sip_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
        // */
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sip.xls";
        $judul = "sip";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nakes");
    xlsWriteLabel($tablehead, $kolomhead++, "Jenis Sarkes");
    xlsWriteLabel($tablehead, $kolomhead++, "Sarkes");
    xlsWriteLabel($tablehead, $kolomhead++, "No Sip");
    xlsWriteLabel($tablehead, $kolomhead++, "No Rekomendasi");
    xlsWriteLabel($tablehead, $kolomhead++, "No Urut");
    xlsWriteLabel($tablehead, $kolomhead++, "Tahun Terbit");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Masuk");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Selesai");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Terbit");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Berlaku");
    xlsWriteLabel($tablehead, $kolomhead++, "Status Sip");

    foreach ($this->Sip_model->get_by_id1() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteNumber($tablebody, $kolombody++, $data->nama);
        xlsWriteNumber($tablebody, $kolombody++, $data->jenis_sarkes);
        xlsWriteNumber($tablebody, $kolombody++, $data->sarkes);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_sip);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_rekomendasi);
        xlsWriteNumber($tablebody, $kolombody++, $data->no_urut);
        xlsWriteNumber($tablebody, $kolombody++, $data->tahun_terbit);
        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_masuk);
        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_selesai);
        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_terbit);
        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_berlaku);
        xlsWriteLabel($tablebody, $kolombody++, $data->status_sip);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Sip.php */
/* Location: ./application/controllers/Sip.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-25 03:25:58 */
/* http://harviacode.com */