<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

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
	 * 
	 *
	 */

	public function __construct() {
        parent::__construct();
        $this->load->model('m_alternatif');
		$this->load->library('form_validation');
    }

	public function index()
	{
		$title['title']= 'Alternatif';
		$data2['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		// $this->load->model('m_alternatif');
		$data['alternatif'] = $this->m_alternatif->tampil_data();

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar',$data2);
		$this->load->view('alternatif', $data);
		// $this->load->view('templates/footer');
		
	}

	public function tambah_aksi(){

			// Mengambil data pengguna berdasarkan email yang ada di session
			$data2['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			
			// Mengambil data alternatif
			$data['alternatif'] = $this->m_alternatif->tampil_data();
		
			// Validasi form
			$this->form_validation->set_rules('id_alternatif2', 'Id alternatif', 'required|trim');
			$this->form_validation->set_rules('nama_alternatif', 'Nama alternatif', 'required|trim');
			$this->form_validation->set_message('required', '{field} harus diisi!');
		
			if ($this->form_validation->run() == false) {
				// Jika validasi gagal, muat ulang tampilan dengan pesan kesalahan
				$title['title'] = 'Alternatif';
				$this->load->view('templates/header', $title);
				$this->load->view('templates/sidebar');
				$this->load->view('templates/topbar', $data2);
				$this->load->view('alternatif', $data);
				$this->session->set_flashdata('modal_open', true);
			} else {
				// Jika validasi berhasil, proses data untuk dimasukkan ke database
				$id_alternatif2 = htmlspecialchars($this->input->post('id_alternatif2', true));
				$nama_alternatif = htmlspecialchars($this->input->post('nama_alternatif', true));
		
				// Siapkan data untuk dimasukkan ke database
				$data = array(
					'id_alternatif2' => $id_alternatif2,
					'nama_alternatif' => $nama_alternatif,
				);
		
				// Masukkan data ke tabel tb_alternatif
				$this->m_alternatif->input_data($data, 'tb_alternatif');
				
				// Redirect ke halaman index alternatif
				redirect('alternatif/index');
			}
		}
    
	public function hapus($id_alternatif){
        $where = array ('id_alternatif'=> $id_alternatif);
        $this->m_alternatif->hapus_data($where,'tb_alternatif');
        redirect('alternatif/index');

    }

	public function update(){
		// Ambil data dari input POST
		$id_alternatif = $this->input->post('id_alternatif');
		$id_alternatif2 = $this->input->post('id_alternatif2');
		$nama_alternatif = $this->input->post('nama_alternatif');
		   
		// Persiapkan data untuk diupdate
		$data = array(
			'id_alternatif' => $id_alternatif,
			'id_alternatif2' => $id_alternatif2,
			'nama_alternatif' => $nama_alternatif,
		);
		
		// Kondisi untuk menentukan data yang akan diupdate
		$where = array('id_alternatif' => $id_alternatif);
		
		// Panggil metode update_data di model
		$this->m_alternatif->update_data($where, $data, 'tb_alternatif');
		
		// Redirect ke halaman alternatif/index
		redirect('alternatif/index');
		
    }

    

}
