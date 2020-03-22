<?php

class KamarModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'kamar';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_one['ruangan'] = array('RuanganModel', 'id', 'ruangan_id');
        $this->has_many['bed'] = array('BedModel', 'kamar_id', 'id');
        parent::__construct();
    }
}
