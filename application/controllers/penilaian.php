<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
        $this->load->model('m_penilaian');
    }
	public function index()
	{
		$title['title']= 'Penilaian';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$this->load->model('m_penilaian');
		$data['nilai'] = $this->m_penilaian->tampil_data()->result();
		

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('penilaian', $data);
		// $this->load->view('templates/footer');
		
	}

	public function hapus($id){
        $where = array ('id_penilaian'=> $id);
        $this->m_penilaian->hapus_data($where,'tb_penilaian');
        redirect('penilaian/index');

    }

}