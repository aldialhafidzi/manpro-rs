<?php

class M_jadwal_poli extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        // $this->db->order_by('jadwal_id', 'ASC');
        return $this->db->from('jadwal_dokter')
            ->join('poliklinik', 'poliklinik.id=jadwal_dokter.poli_id')
            ->join('dokter', 'dokter.id=jadwal_dokter.dokter_id')
            ->join('perawat', 'perawat.id=jadwal_dokter.perawat_id')
            ->get();
    }

    public function getPoliklinik()
    //ieu nu diganti
    {
        $query = "SELECT `jadwal_dokter`.*, `poliklinik`.`nama`
                  FROM `jadwal_dokter` JOIN `poliklinik`
                  ON `jadwal_dokter`.`poli_id` = `poliklinik`.`id`
                  ";

        return $this->db->query($query)->result_array();
    }

    public function input_data($data)
    {
        $this->db->insert('jadwal_dokter', $data);
    }

    public function hapus_data($where, $table)
    {
        // $query = "DELETE `jadwal_dokter`.*, `poliklinik`.`nama`
        //           FROM `jadwal_dokter` JOIN `poliklinik`
        //           ON `jadwal_dokter`.`poli_id` = `poliklinik`.`poli_id`
        //           ";

        // return $this->db->query($query)->result_array();
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
