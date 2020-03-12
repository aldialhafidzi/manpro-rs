<?php
class SpecializationModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'specialization';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['dokter'] = 'DokterModel';
        parent::__construct();
    }
}
