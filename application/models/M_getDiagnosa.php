<?php 
class M_getDiagnosa extends CI_Model {
    public function getDiagnosa()
    {
        $query = "SELECT `detail_transaksi`.*, `tindakan`.`tindakan`
                  FROM `detail_transaksi` JOIN `tindakan`
                  ON `detail_transaksi`.`tindakan_id` = `tindakan`.`tindakan_id`
                  ";

        return $this->db->query($query)->result_array();
    }

}