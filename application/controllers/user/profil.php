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

	
}