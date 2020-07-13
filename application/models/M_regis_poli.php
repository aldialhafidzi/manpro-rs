<?php

class M_regis_poli extends CI_Model{
    public function tampil_data()
    {
        $this->db->select('*, transaksi.id as transaksi_id');
        $this->db->order_by('id','ASC');
        return $this->db->from('transaksi')
        ->join('pasien','pasien.id=transaksi.pasien_id')
        ->join('jadwal_dokter','jadwal_dokter.jadwal_id=transaksi.jadwal_id')
        //->join('perawat','perawat.id_perawat=transaksi.id_perawat')
        ->get();
    }

    public function getPasien()
    {
        $query = "SELECT `transaksi`.*, `pasien`.`nama`
                  FROM `transaksi` JOIN `pasien`
                  ON `transaksi`.`id_pasien` = `pasien`.`id_pasien`
                  ";

        return $this->db->query($query)->result_array();
    }

    public function input_data($data)
    {
        $this->db->insert('transaksi', $data);
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