<?php 
class M_getPer extends CI_Model{
    public function getPer()
    {
        $query = "SELECT `jadwal_dokter`.*, `perawat`.`nama`
                  FROM `jadwal_dokter` JOIN `perawat`
                  ON `jadwal_dokter`.`perawat_id` = `perawat`.`id`
                  ";

        return $this->db->query($query)->result_array();
    }
}