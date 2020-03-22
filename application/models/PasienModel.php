<?php
class PasienModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'pasien';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['rekam_medis'] = array('RekamMedisModel', 'pasien_id', 'id');
        $this->has_many['transaksi'] = array('TransaksiModel', 'pasien_id', 'id');
        $this->has_one['tipe_pasien'] = array('TipePasienModel', 'id', 'tipe_id');
        parent::__construct();
    }

    public function lastRecord()
    {
        $table = 'pasien';
        $this->db->order_by('id', 'desc');
        return $this->db->get($table)->row();
    }

    public function post($data)
    {
        $table = 'pasien';
        return $this->db->insert($table, $data);
    }
}
