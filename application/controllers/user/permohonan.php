<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_pengguna');
		$this->load->model('m_permohonan');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper(['url', 'form']);
    }

	public function index()
	{
		$data['title']= 'User';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$id_user = $this->session->userdata('id_user');
		$data['permohonan'] = $this->m_permohonan->getPermohonan($id_user);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/user_sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('user_permohonan', $data);
		// $this->load->view('templates/footer');
	}

	public function upload(){
		$id_user =$this->session->userdata('id_user');
		
		// Ambil periode yang sedang aktif
		$current_date = date('Y-m-d');
		$this->load->model('M_periode');
		$periode_aktif = $this->M_periode->get_active_periode($current_date);
		
		// Cek apakah ada periode yang aktif
		if (!$periode_aktif) {
			$this->session->set_flashdata('error', 'Mohon maaf periode  pengajuan bantuan sudah berakhir.');
			redirect('user/permohonan');
			return;
		}

		// Validasi input form
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');
        $this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required');
        $this->form_validation->set_rules('tanggungan', 'Tanggungan', 'required');
		$this->form_validation->set_message('required', 'Tidak boleh kosong');
     
		if($this->form_validation->run() == false){
        	$this->session->set_flashdata('modal_open', 'true');
			$this->index();
		}

		 // Inisialisasi pesan error upload
		 $upload_errors = [];

		//Upload proposal
		$proposal_config = array(
			'upload_path' 	=> './uploads/proposal/',
			'allowed_types' => 'pdf',
			'max_size' 		=> 5000 
		);
		$this->upload->initialize($proposal_config);

		if (!$this->upload->do_upload('proposal')) {
			$upload_errors[] = "Proposal harus dalam format PDF: " . $this->upload->display_errors('', '');
		} 
		else {
			$proposal_upload = $this->upload->data();
			$proposal = $proposal_upload['file_name'];
		}


		//Upload KK
		$kk_config = array(
			'upload_path' 	=> './uploads/kk/',
			'allowed_types' => 'pdf|png|jpg|jpeg',
			'max_size' 		=> 5000 
		);
		$this->upload->initialize($kk_config);

		if (!$this->upload->do_upload('kk')) {
			$upload_errors[] = "KK harus dalam format PDF/PNG/JPG/JPEG: " . $this->upload->display_errors('', '');
			$kk = NULL;
		} 
		else {
			$kk_upload = $this->upload->data();
			$kk = $kk_upload['file_name'];
		}

		
		//Upload KTP
		$ktp_config = array(
			'upload_path' 	=> './uploads/ktp/',
			'allowed_types' => 'pdf|png|jpg|jpeg',
			'max_size' 		=> 5000 
		);
		$this->upload->initialize($ktp_config);

		if (!$this->upload->do_upload('ktp')) {
			$upload_errors[] = "KTP harus dalam format PDF/PNG/JPG/JPEG: " . $this->upload->display_errors('', '');
        	$ktp = NULL;
		} 
		else {
			$ktp_upload = $this->upload->data();
			$ktp = $ktp_upload['file_name'];
		}


		//Upload SKU
		$sku_config = array(
			'upload_path' 	=> './uploads/sku/',
			'allowed_types' => 'pdf',
			'max_size' 		=> 5000 
		);
		$this->upload->initialize($sku_config);

		if (!$this->upload->do_upload('sku')) {
			$upload_errors[] = "SKU harus dalam format PDF: " . $this->upload->display_errors('', '');
			$sku = NULL;
		} 
		else {
			$sku_upload = $this->upload->data();
			$sku = $sku_upload['file_name'];
		}

		// Jika ada error dalam upload, tampilkan pesan error di bawah form
		if (!empty($upload_errors)) {
			$this->session->set_flashdata('upload_errors', implode('<br>', $upload_errors));
			redirect('user/permohonan');
			return;
		}


		 // Cek apakah NIK sudah ada di tabel penerima
		 $nik = $this->input->post('nik', TRUE);
		 $riwayat_bantuan = "Belum Pernah"; // Default value
		 
		 $this->db->where('nik', $nik);
		 $penerima = $this->db->get('tb_penerima')->row();
		 
		 if ($penerima) {
			 // Jika NIK ditemukan, berarti sudah pernah menerima bantuan
			 $riwayat_bantuan = "Sudah Pernah";
		 }


		//$nik = $this->input->post('nik', TRUE);
		$nama_usaha = $this->input->post('nama_usaha', TRUE);
		$pendapatan = $this->input->post('pendapatan', TRUE);
		$tanggungan = $this->input->post('tanggungan', TRUE);
		$status = 'Diproses';
		$created = date('Y');
		$date_created = date('Y-m-d H:i:s');
		
		if ($this->m_permohonan->checkUserDuplicate($id_user, $created)) {
 			$this->session->set_flashdata('error', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Mohon maaf Anda sudah mengajukan permohonan pada periode ini');
 		redirect('user/permohonan');
 		}
	
		$data=[
			'id_user' => $id_user,
			//'id_periode' => $periode_aktif->id_periode,
			'nik'=> $nik,
            'nama_usaha' => $nama_usaha,
            'pendapatan' => $pendapatan,
            'tanggungan' => $tanggungan,
            'proposal' => $proposal,
            'sku' => $sku,
            'kk' => $kk,
            'ktp' => $ktp,
			'status' => $status,
			'created'=> $created,
			'date_created' =>$date_created,
			'riwayat_bantuan' =>$riwayat_bantuan
		];
		$this->m_permohonan->input_data($data);
		redirect('user/permohonan');

	}

	public function hapus($id_permohonan){
        $where =  array ('id_permohonan'=> $id_permohonan);
        $this->m_data->hapus_data($where,'tb_permohonan');
        redirect('user/permohonan/index');

    }


		
}



