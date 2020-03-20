<?php
class TransaksiModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'transaksi';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['detail_transaksi'] = 'DetailTransaksiModel';
        $this->has_one['pasien'] = array('PasienModel', 'id', 'pasien_id');
        $this->has_one['jadwal_dokter'] = array('JadwalDokterModel', 'id', 'jadwal_id');
        $this->has_one['user'] = array('UserModel', 'id', 'user_id');
        parent::__construct();
    }

    public function lastRecord()
    {
        $table = 'transaksi';
        $this->db->order_by('id', 'desc');
        return $this->db->get($table)->row();
    }

    public function post($data)
    {
        $table = 'transaksi';
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}
