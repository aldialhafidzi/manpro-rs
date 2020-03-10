<?php
class DetailTransaksiModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'users';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_one['ruangan'] = array('RuanganModel', 'id', 'ruangan_id');
        $this->has_one['obat'] = array('ObatModel', 'id', 'obat_id');
        $this->has_one['tindakan'] = array('TindakanModel', 'id', 'tindakan_id');
        $this->has_one['penyakit'] = array('PenyakitModel', 'id', 'penyakit_id');
        $this->has_one['transaksi'] = array('TransaksiModel', 'id', 'transaksi_id');
        parent::__construct();
    }
}
