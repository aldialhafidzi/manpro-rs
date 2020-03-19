<?php
class RuangRawatModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'ruang_rawat';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        // $this->has_many['users'] = 'UserModel';
        parent::__construct();
    }
}
