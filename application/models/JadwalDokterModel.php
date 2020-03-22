<?php
class JadwalDokterModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'jadwal_dokter';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_one['poliklinik'] = array('PoliklinikModel', 'id', 'poli_id');
        $this->has_one['dokter'] = array('DokterModel', 'id', 'dokter_id');
        $this->has_many['detail_transaksi'] = array('DetailTransaksiModel', 'jadwal_dokter_id', 'id');
        parent::__construct();
    }
}
