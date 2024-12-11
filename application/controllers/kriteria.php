<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->model('m_data');
		$this->load->library('form_validation');
    }
	public function index()
	{
		$title['title']= 'Kriteria';
		$data2['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
		
		// Generate ID Kriteria di sini
		$last_kriteria = $this->db->select('id')
		->order_by('id', 'DESC')
		->limit(1)
		->get('tb_kriteria')
		->row_array();

		$new_id_number = $last_kriteria ? $last_kriteria['id'] + 1 : 1;
		$new_id_kriteria = 'K' . str_pad($new_id_number, 3, '0', STR_PAD_LEFT); // Contoh: K001

		$data['id_kriteria'] = $new_id_kriteria;
		$data['kriteria'] = $this->m_data->tampil_data();

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar',$data2);
		$this->load->view('kriteria', $data);
		// $this->load->view('templates/footer');
		
	}
	public function get_all_kriteria() {
		$query = $this->db->get('tb_kriteria');
		return $query->result();
	}

	public function tambah_aksi() {
		// Mengambil data pengguna berdasarkan email yang ada di session
		$data2['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			
		// Mengambil data alternatif
		$data['kriteria'] = $this->m_data->tampil_data();
	
		// Validasi form
		$this->form_validation->set_rules('nama_kriteria', 'Nama kriteria', 'required|trim');
		$this->form_validation->set_rules('jenis_kriteria', 'Jenis kriteria', 'required|trim');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required|trim|numeric|greater_than[0]|less_than_equal_to[9]', [
			'greater_than' => 'Bobot harus lebih dari 0!',
			'less_than_equal_to' => 'Bobot harus 1 digit',
			'numeric' => 'Bobot harus berupa angka!'
		]);
	
		$this->form_validation->set_message('required', '{field} harus diisi!');
	
		// cek validasi form
		if ($this->form_validation->run() == false) {
			// Jika validasi gagal, modal akan otomatis terbuka
			$title['title'] = 'Kriteria';
			$data['id_kriteria'] = $this->generate_id_kriteria(); // Generate ID Kriteria
			$this->load->view('templates/header', $title);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data2);
			$this->load->view('kriteria', $data);
			$this->session->set_flashdata('modal_open', true);
		} else {
		
			// Ambil input data
			$nama_kriteria = $this->input->post('nama_kriteria', true);
			$jenis_kriteria = $this->input->post('jenis_kriteria', true);
			$bobot = $this->input->post('bobot', true);
	
			// Mengecek total bobot saat ini di database
			$total_bobot = $this->db->select_sum('bobot')->get('tb_kriteria')->row()->bobot;
			
			 // Cek apakah total bobot ditambah bobot baru melebihi 1
			 if ($total_bobot + $bobot > 1) {
				$this->session->set_flashdata('error', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Gagal Menambahkan data');
 				redirect('kriteria/index');
			} else {
				// Jika total bobot valid, maka lanjutkan dengan proses penyimpanan data
	
				// Generate ID Kriteria baru
				$id_kriteria = $this->generate_id_kriteria();
	
				// Siapkan data untuk dimasukkan ke database
				$data = array(
					'id_kriteria' => $id_kriteria,
					'nama_kriteria' => $nama_kriteria,
					'jenis_kriteria' => $jenis_kriteria,
					'bobot' => $bobot,
				);
	
			 // Coba untuk menyimpan data ke database
            if ($this->m_data->input_data($data, 'tb_kriteria')) {
                // Jika berhasil, tampilkan pesan sukses
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data kriteria berhasil ditambahkan</div>');
            } else {
                // Jika gagal menyimpan data, tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menambahkan kriteria! Terjadi kesalahan pada sistem.</div>');
            }
	
			// Redirect ke halaman index kriteria
			redirect('kriteria/index');
		}
	}
}
	
	// Fungsi untuk generate ID kriteria
	private function generate_id_kriteria() {
		$last_id = $this->db->select('id')
			->order_by('id', 'DESC')
			->limit(1)
			->get('tb_kriteria')
			->row('id');
	
		$new_id_number = $last_id ? $last_id + 1 : 1;
		return 'K' . str_pad($new_id_number, 3, '0', STR_PAD_LEFT); // Contoh: K001, K002, dst.
	}
	
	public function hapus($id){
        $where =  array ('id'=> $id);
        $this->m_data->hapus_data($where,'tb_kriteria');
        redirect('kriteria/index');

    }

	public function update(){
		// Ambil data dari input POST
        $id         	= $this->input->post('id');
        $id_kriteria    = $this->input->post('id_kriteria');
        $nama_kriteria  = $this->input->post('nama_kriteria');
        $jenis_kriteria = $this->input->post('jenis_kriteria');
        $bobot    		= $this->input->post('bobot');
        
		// Persiapkan data untuk diupdate
        $data = array(
			'id'				=>$id,
			'id_kriteria'		=>$id_kriteria,
            'nama_kriteria'     =>$nama_kriteria,
            'jenis_kriteria'    =>$jenis_kriteria,
            'bobot' 			=>$bobot
        );

		// Kondisi untuk menentukan data yang akan diupdate
        $where = array('id'=>$id);

		// Panggil metode update_data di model
		$this->m_data->update_data($where, $data, 'tb_kriteria');

		// Redirect ke halaman alternatif/index
        redirect('kriteria/index');

    }

    

}
