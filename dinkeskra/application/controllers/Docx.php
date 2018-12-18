<?php
include"DocxTemplate.php";
class Docx extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Sip_model');
            $this->load->model('Nakes_model');
            $this->load->model('Pejabat_model');
            $this->load->database();
            
        }

        public function changeDate($tanggal){
        $bulan = array( 1 => 'Januari', 'Februari', 'Maret',
                             'April', 'Mei', 'Juni',
                             'Juli', 'Agustus', 'Oktober', 
                             'September', 'November', 'Desember');
        $split = explode('-', $tanggal);
        return $split[2].' '.$bulan[(int)$split[1]].' '. $split[0];
        }

        public function cetaksip($id){
            $row = $this->Sip_model->get_by_id1($id)[0];
            $pejabat = $this->Pejabat_model->pejabat_aktif();
            
        	$docx = new DocxTemplate('./assets/docx/template.docx');

            foreach ($row as $nakes)
            {
                $docx->set('kodepos', $row['kodepos']);
                $docx->set('kapital', $row['kapital']);
                $docx->set('singkatan', $row['singkatan']);
                $docx->set('no_sip', $row['no_sip']);
                $docx->set('nama', $row['nama']);
                $docx->set('tmp_lahir', $row['tmp_lahir']);
                $docx->set('tgl_lahir', $this->changeDate($row['tgl_lahir']));
                $docx->set('alamat', $row['alamat']);
                $docx->set('no_urut', $row['no_urut']);
                $docx->set('no_str', $row['no_str']);
                $docx->set('masa_berlaku', $this->changeDate($row['masa_berlaku']));
                $docx->set('no_rekomendasi', $row['no_rekomendasi']);
                $docx->set('jenis_nakes', $row['jenis_nakes']);
                $docx->set('sarkes', $row['sarkes']);
                $docx->set('alamat_sarkes', $row['alamat_sarkes']);
                $docx->set('nama_pejabat', $pejabat->nama_pejabat);
                $docx->set('pangkat', $pejabat->pangkat);
                if($pejabat->pangkat == "Kepala"){
                    $docx->set('atas', "");
                }else{
                    $docx->set('atas', "a.n. ");
                }
                
                $docx->set('jabatan', $pejabat->jabatan);
                $docx->set('nip', $pejabat->nip);
          		$docx->set('tanggal_terbit', $this->changeDate($row['tanggal_terbit']));
                $bulan = array( 1 => "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                $docx->set('bulan', $bulan[date('n')]);
                $docx->set('tahun', date('Y'));

                $nama_file = $row['id_sip'] . '_sip.docx';
                $docx->saveAs($nama_file);

                header("Content-Type: application/octet-stream");
                header("Content-Disposition: attachment; filename=" . $nama_file);
                readfile($nama_file);
                unlink($nama_file);
            }
        }

         //    $docx->set('peserta', $row['peserta']);
         //    $docx->set('tgl_mulai', $row['tgl_mulai']);
         //    $docx->set('tgl_selesai', $row['tgl_selesai']);
         //    $docx->set('tgl_keluar', $row['tgl_keluar']);
         //    $docx->set('tembusan', $row['tembusan']);

   //      public function nakes($id){
   //          $data = $this->nakes_model->SelectData('nakes', array('id_nakes'=> $id));
   //          $row = $data[0];
   //          print_r($row);
   //          $docx = new DocxTemplate('./assets/docx/template.docx');
   //          $docx->set('nama', $row['nama']);
            
			// $nama_file = $row['id_sip'] . '_sip.docx';
			// $docx->saveAs($nama_file);

			// header("Content-Type:apllication/msword");
			// header("Content-Disposition: attachment;filename=" . $nama_file);
			// readfile($nama_file);
   //      }
}
?>