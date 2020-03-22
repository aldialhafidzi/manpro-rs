<?php
class DokterModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'dokter';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_one['specialization'] = array('SpecializationModel', 'id', 'spec_id');
        $this->has_one['poliklinik'] = array('PoliklinikModel', 'id', 'poli_id');
        $this->has_many['rekam_medis'] = array('RekamMedisModel', 'dokter_id', 'id');
        parent::__construct();
    }
}
