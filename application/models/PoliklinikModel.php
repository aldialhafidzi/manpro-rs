<?php
class PoliklinikModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'poliklinik';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['dokter'] = 'DokterModel';
        $this->has_many['jadwal_dokter'] = array('JadwalDokterModel', 'poli_id', 'id');
        parent::__construct();
    }
}
