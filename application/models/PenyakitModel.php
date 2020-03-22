<?php
class PenyakitModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'penyakit';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['rekam_medis'] = array('RekamMedisModel', 'penyakit_id', 'id');
        parent::__construct();
    }
}
