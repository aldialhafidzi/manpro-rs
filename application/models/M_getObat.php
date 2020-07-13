<?php 
class M_getObat extends CI_Model {
    public function getObat()
    {
        $query = "SELECT `detail_transaksi`.*, `obat`.`nama`
                  FROM `detail_transaksi` JOIN `obat`
                  ON `detail_transaksi`.`id_drugs` = `obat`.`id_drugs`
                  ";

        return $this->db->query($query)->result_array();
    }
}