<?php
class ObatModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'obat';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        parent::__construct();
    }
}
