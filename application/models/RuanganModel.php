<?php
class RuanganModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'ruangan';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        // $this->has_many['users'] = 'UserModel';
        parent::__construct();
    }
}
