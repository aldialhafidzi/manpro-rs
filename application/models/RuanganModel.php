<?php
class RuanganModel extends CI_Model
{   
    
    public function __construct()
    {
        $this->table = 'ruangan';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        parent::__construct();
    }

    function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    function getByKode($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

}
