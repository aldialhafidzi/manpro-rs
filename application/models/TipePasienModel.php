<?php
class TipePasienModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'tipe_pasien';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['pasien'] = array('PasienModel', 'tipe_id', 'id');
        parent::__construct();
    }
}
