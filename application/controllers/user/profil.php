<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct() {

        parent::__construct();
        $this->load->model('m_pengguna');
		$this->load->library('form_validation');
		//  // Pastikan session user sudah ada sebelum mengakses fungsi-fungsi berikut
		//  if (!$this->session->userdata('id_user')) {
        //     redirect('login'); // Redirect ke halaman login jika belum login
        // }
    }

	public function index()
	{
		$title['title']= 'User';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$id_user = $this->session->userdata('id_user');
		
		$data['user'] = $this->m_pengguna->getUser($id_user);
	
		$this->load->view('templates/header',$title);
		$this->load->view('templates/user_sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('user_profil',$data);
		// $this->load->view('templates/footer');
		
	}
	public function update(){
		// Ambil data dari input POST
		$id_user = $this->input->post('id_user');
		$id_role = $this->input->post('id_role');
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');

		 // Ambil data lama dari database
		 $datauser = $this->m_pengguna->getUser($id_user);
    
		 // Jika password baru diisi, hash password tersebut
		 if (!empty($password)) {
			 $hashed_password = password_hash($password, PASSWORD_DEFAULT);
		 } else {
			 // Jika password kosong, gunakan password lama
			 $hashed_password = $datauser->password;
		 }
		   
		// Persiapkan data untuk diupdate
		$data = array(
			'id_user' => $id_user,
			'id_role' => $id_role,
			'nama' => $nama,
			'no_hp' => $no_hp,
			'alamat' => $alamat,
			'password' => $hashed_password,
		);
		
		// Kondisi untuk menentukan data yang akan diupdate
		$where = array('id_user' => $id_user);
		
		// Panggil metode update_data di model
		$this->m_pengguna->update_profil($where, $data, 'tb_user');
		
		// Redirect ke halaman alternatif/index
		redirect('user/profil');
		
    }



	
}