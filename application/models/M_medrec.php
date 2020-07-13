<?php

class M_medrec extends CI_Model{
    public function tampil_data()
    {
        $this->db->order_by('id_medrec','ASC');
        return $this->db->from('detail_transaksi')
        ->join('pasien','pasien.id=transaksi.pasien_id')
        ->join('dokter','dokter.id=detail_transaksi.dokter_id')
        ->join('tindakan','tindakan.id=detail_transaksi.tindakan_id')
        ->join('obat','obat.id=detail_transaksi.obat_id')
        //->join('perawat','perawat.id_perawat=detail_transaksi.id_perawat')
        ->get();
    }

    public function getPasien()
    {
        $query = "SELECT `transaksi`.*, `pasien`.`nama`
                  FROM `transaksi` JOIN `pasien`
                  ON `transaksi`.`pasien_id` = `pasien`.`id`
                  ";

        return $this->db->query($query)->result_array();
    }

    public function input_data($data)
    {
        $this->db->insert('detail_transaksi', $data);
    }

    public function hapus_data($where, $table) 
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$table,$data)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}