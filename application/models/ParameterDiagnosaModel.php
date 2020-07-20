<?php
class ParameterDiagnosaModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'parameter_diagnosa';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['rekam_medis'] = array('RekamMedisModel', 'parameter_diagnosa_id', 'id');
        $this->has_many['detail_transaksi'] = array('DetailTransaksiModel', 'parameter_diagnosa_id', 'id');
        parent::__construct();
    }
}
