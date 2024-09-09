<?php 

class M_hasil extends CI_Model{
    public function tampil_data(){
        $this->db->select('tb_hasil.*, tb_user.nama, tb_permohonan.status, tb_hasil.id_permohonan, ');
        $this->db->from('tb_hasil');
        $this->db->join('tb_penilaian', 'tb_hasil.id_permohonan = tb_penilaian.id_permohonan');
        $this->db->join('tb_permohonan', 'tb_penilaian.id_permohonan = tb_permohonan.id_permohonan');
        $this->db->join('tb_user', 'tb_permohonan.id_user = tb_user.id_user');
        $this->db->order_by('tb_hasil.hasil', 'DESC');
        $this->db->group_by('tb_user.nama');
        $query = $this->db->get();
        $data_hasil = $query->result();

        // Hitung 40% dari total permohonan
        $total_permohonan = count($data_hasil);
        $limit_diterima = ceil(0.4 * $total_permohonan); // 40% dari jumlah permohonan

        // Update status menjadi 'Diterima' untuk 40% permohonan teratas, sisanya 'Ditolak'
        foreach ($data_hasil as $index => $row) {
            if ($index < $limit_diterima) {
                // Update status ke Diterima
                $this->db->where('id_permohonan', $row->id_permohonan);
                $this->db->update('tb_permohonan', ['status' => 'Diterima']);
            } else {
                // Update status ke Ditolak
                $this->db->where('id_permohonan', $row->id_permohonan);
                $this->db->update('tb_permohonan', ['status' => 'Ditolak']);
            }
        }

         // Kembalikan data hasil yang sudah diperbarui untuk ditampilkan di controller
         return $data_hasil;
       
    }

    public function insertHasil($data) {
        $this->db->insert('tb_hasil', $data);
    }

    public function get_periode() {
        $this->db->select('DISTINCT(YEAR(created)) as year');
        $this->db->from('tb_permohonan');
        $this->db->order_by('year', 'DESC');  // Mengurutkan dari tahun terbaru
        return $this->db->get()->result();
    }
    
}
?>