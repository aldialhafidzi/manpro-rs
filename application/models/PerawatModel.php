<?php
class PerawatModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'perawat';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['jadwal_dokter'] = array('JadwalDokterModel', 'perawat_id', 'id');
        parent::__construct();
    }
}
