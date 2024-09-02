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

		// $id_permohonan = $this->session->userdata('id_');
		// $data['user'] = $this->m_pengguna->getUser($id_user);
		//$id_permohonan = $this->session->userdata('id_permohonan');
		//$data['permohonan'] = $this->m_permohonan->getPermohonan($id_permohonan);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/user_sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('user_permohonan', $data);
		// $this->load->view('templates/footer');
		
	}

	public function tambah_aksi(){

		// Validasi input form
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');
        $this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required');
        $this->form_validation->set_rules('tanggungan', 'Tanggungan', 'required');
     

		if($this->form_validation->run()==false){
			//Jika validasi gagal kembali ke halaman awal
			$this->session->set_flashdata('modal_open', 'true');
			$this->index();
		} else{
			// Ambil id user dari session
			$id_user =$this->session->userdata('id_user');

			//Proses upload file
			$proposal =$this->_uploadFile('proposal');
			$sku =$this->_uploadFile('sku');
			$kk =$this->_uploadFile('kk');
			$ktp =$this->_uploadFile('ktp');

			//Membuat array data yang akan disimpan
			$data=[
				'id_user' => $id_user, // Menambahkan ID user ke data
                'nama_usaha' => $this->input->post('nama_usaha'),
                'pendapatan' => $this->input->post('pendapatan'),
                'tanggungan' => $this->input->post('tanggungan'),
                'proposal' => $proposal,
                'sku' => $sku,
                'kk' => $kk,
                'ktp' => $ktp,
				'status' => 'Diproses',
				'created'=> date('Y')
			];
			
			
			// Masukkan data ke tabel tb_alternatif
		$this->m_permohonan->input_data($data, 'tb_permohonan');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil ditambahkan</div>');
        redirect('user/permohonan'); // Redirect ke halaman permohonan
		}
	
		
			
	}

	private function _uploadFile($fieldName) {
        $config['upload_path'] = './uploads/' . $fieldName . '/';
    	$config['allowed_types'] = 'pdf|png|jpeg|jpg';
    	$config['max_size'] = 2048; // 2MB
		$config['file_name'] = $_FILES[$fieldName]['name'];
		$config['overwrite'] = TRUE; // Allow overwrite if the file already exists

		
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($fieldName)) {
			$error = $this->upload->display_errors();
            $this->session->set_flashdata('message', $error);
            return '';

        } else {
           // Jika upload berhasil, kembalikan nama file yang diupload
        $uploadedData = $this->upload->data();
        return $uploadedData['file_name'];
        }
    }


	public function upload(){
		$id_user =$this->session->userdata('id_user');
		
		// Validasi input form
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');
        $this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required');
        $this->form_validation->set_rules('tanggungan', 'Tanggungan', 'required');
		$this->form_validation->set_message('required', '{field} harus diisi!');
     
		if($this->form_validation->run() == false){
			$errors = validation_errors();
			$this->session->set_flashdata('errors', '<div class="alert alert-danger text-center" role="alert">' . $errors . '</div>');
 			redirect('user/permohonan');
 			return;
		}


		//Upload proposal
		$proposal_config = array(
			'upload_path' 	=> './uploads/proposal/',
			'allowed_types' => 'pdf',
			'max_size' 		=> 5000 
		);
		$this->upload->initialize($proposal_config);

		if (!$this->upload->do_upload('proposal')) {
			echo "Proposal Harus Dalam Format PDF: " . $this->upload->display_errors();
			return;
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
			$sku = NULL;
		} 
		else {
			$sku_upload = $this->upload->data();
			$sku = $sku_upload['file_name'];
		}

		$nama_usaha = $this->input->post('nama_usaha', TRUE);
		$pendapatan = $this->input->post('pendapatan', TRUE);
		$tanggungan = $this->input->post('tanggungan', TRUE);
		$status = 'Diproses';
		$created = date('Y');
		
		if ($this->m_permohonan->checkUserDuplicate($id_user, $created)) {
 			$this->session->set_flashdata('error', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Mohon maaf Anda sudah mengajukan permohonan pada periode ini');
 		redirect('user/permohonan');
 		}
	
		$data=[
			'id_user' => $id_user, 
            'nama_usaha' => $nama_usaha,
            'pendapatan' => $pendapatan,
            'tanggungan' => $tanggungan,
            'proposal' => $proposal,
            'sku' => $sku,
            'kk' => $kk,
            'ktp' => $ktp,
			'status' => $status,
			'created'=> $created
		];
		$this->m_permohonan->input_data($data);
		redirect('user/permohonan');

	}
		
}



