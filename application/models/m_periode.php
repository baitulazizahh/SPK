<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_periode extends CI_Model {

    public function get_all_periode() {
        $this->db->order_by('tgl_mulai', 'DESC');
        return $this->db->get('tb_periode')->result();
    }

    public function get_active_periode($current_date) {
        $current_date = date('Y-m-d');
        $this->db->where('tgl_mulai <=', $current_date);
        $this->db->where('tgl_akhir >=', $current_date);
        return $this->db->get('tb_periode')->row_array();
    }

    public function insert_periode($data) {
        return $this->db->insert('tb_periode', $data);
    }

    public function update_periode($where, $data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_periode($id_periode) {
        $this->db->where('id_periode', $id_periode);
        return $this->db->delete('tb_periode');
    }

    // Ambil data periode dengan ID terbesar (terbaru)
    public function get_periode_terbaru_by_id() {
        $this->db->order_by('id_periode', 'DESC'); // Urutkan dari ID terbesar
        $this->db->limit(1); // Batasi hanya satu hasil
        $query = $this->db->get('tb_periode'); // Ambil data dari tabel tb_periode
        return $query->row(); // Mengambil satu row (periode terbaru)
    }


}
?>
