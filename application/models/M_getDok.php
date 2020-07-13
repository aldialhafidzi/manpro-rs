<?php 
class M_getDok extends CI_Model{
    public function getDokter()
    {
        $query = "SELECT `jadwal_dokter`.*, `dokter`.`nama`
                  FROM `jadwal_dokter` JOIN `dokter`
                  ON `jadwal_dokter`.`dokter_id` = `dokter`.`id`
                  ";

        return $this->db->query($query)->result_array();
    }
}