<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

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
        $this->load->model('m_hasil');
		// $this->load->library('form_validation');
    }
	public function index()
	{
		// $this->load->model('m_perhitungan');
		// $data['alternatif'] = $this->m_perhitungan->tampil_data()->result();
		$title['title']= 'Hasil akhir';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['hasil'] = $this->m_hasil->tampil_data();
	
		
		

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		// Tampilkan view hasil akhir
		$this->load->view('hasil', $data);
		// $this->load->view('templates/footer');

		
	}


}