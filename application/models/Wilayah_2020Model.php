<?php
class Wilayah_2020Model extends MY_Model
{
    public function __construct()
    {
        $this->table = 'wilayah_2020';
        $this->soft_deletes = false;
        parent::__construct();
    }

    public function provinsi()
    {
        $this->db->select('*');
        $this->db->from('wilayah_2020');
        $this->db->where('LENGTH(kode) =', 2, FALSE);
        return $this->db->get()->result_array();
    }

    public function kota($search)
    {
        $this->db->select('*');
        $this->db->like('nama', $search, 'both');
        $this->db->limit(15);
        $this->db->from('wilayah_2020');
        $this->db->where('LENGTH(kode) =', 4, FALSE);
        return $this->db->get()->result_array();
    }

    public function kecamatan($search)
    {
        $this->db->select('*');
        $this->db->like('nama', $search, 'both');
        $this->db->limit(15);
        $this->db->from('wilayah_2020');
        $this->db->where('LENGTH(kode) =', 6, FALSE);
        return $this->db->get()->result_array();
    }

    public function kelurahan($search)
    {
        $this->db->select('*');
        $this->db->like('nama', $search, 'both');
        $this->db->limit(15);
        $this->db->from('wilayah_2020');
        $this->db->where('LENGTH(kode) =', 10, FALSE);
        return $this->db->get()->result_array();
    }
}
