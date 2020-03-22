<?php

class BedModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'bed';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_one['kamar'] = array('KamarModel', 'id', 'kamar_id');
        $this->has_many['detail_transaksi'] = array('DetailTransaksiModel', 'bed_id', 'id');
        parent::__construct();
    }

    public function getBed($search)
    {
        $this->table = 'bed';
        $this->db->select(array(
            'bed.id', 'bed.kode', 'bed.status',
            'kamar.id as kamar_id', 'kamar.kode as kamar_kode', 'kamar.status as kamar_status',
            'ruangan.id as ruangan_id', 'ruangan.kode as ruangan_kode', 'ruangan.status as ruangan_status', 'ruangan.nama', 'kelas', 'harga'
        ));

        $this->db->from($this->table);
        $this->db->join('kamar', 'kamar.id = bed.kamar_id');
        $this->db->join('ruangan', 'ruangan.id = kamar.ruangan_id');
        $this->db->like('ruangan.nama', $search);

        return $this->db->get()->result_array();
    }
}
