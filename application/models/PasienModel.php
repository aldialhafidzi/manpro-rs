<?php
class PasienModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'pasien';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['transaksi'] = 'TransaksiModel';
        parent::__construct();
    }

    public function lastRecord(){
        $table = 'pasien';
        $this->db->order_by('id', 'desc');
        return $this->db->get($table)->row();
    }
}
