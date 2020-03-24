<?php
class TransaksiModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'transaksi';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['detail_transaksi'] = array('DetailTransaksiModel', 'transaksi_id', 'id');
        $this->has_one['pasien'] = array('PasienModel', 'id', 'pasien_id');
        $this->has_one['user'] = array('UserModel', 'id', 'user_id');
        parent::__construct();
    }

    public function lastRecord()
    {
        $table = 'transaksi';
        $this->db->order_by('id', 'desc');
        return $this->db->get($table)->row();
    }

    public function post($data)
    {
        $table = 'transaksi';
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function make_query($tipe_rawat)
    {
        $this->table = 'transaksi';
        $this->order_column = array(null, 'pasien.no_mr', 'pasien.nama', 'pasien.no_telp');
        $this->db->select(array(
            'transaksi.id', 'detail_transaksi.created_at as tgl_rekam',
            'pasien.nama', 'pasien.no_mr', 'pasien.tanggal_lahir', 'pasien.no_telp', 'pasien.kecamatan', 'pasien.kelurahan', 'pasien.rt', 'pasien.rw',
            'transaksi.no_bill', 'transaksi.created_at as tanggal_transaksi', 'transaksi.jenis_rawat', 'transaksi.pasien_id', 'transaksi.total_tarif',
            'transaksi.status'
        ));

        $this->db->from($this->table);
        $this->db->join('detail_transaksi', 'detail_transaksi.transaksi_id = transaksi.id');
        $this->db->join('pasien', 'pasien.id = transaksi.pasien_id');
        $this->db->where('transaksi.jenis_rawat', $tipe_rawat);
        $this->db->group_by('transaksi.no_bill');

        if (isset($_POST['search']['value']) && $_POST['search']['value'] !== '') {
            $this->db->group_start();
            $this->db->or_like("pasien.no_mr", $_POST['search']['value']);
            $this->db->or_like("pasien.nama", $_POST['search']['value']);
            $this->db->or_like("pasien.no_telp", $_POST['search']['value']);
            $this->db->or_like("pasien.kelurahan", $_POST['search']['value']);
            $this->db->group_end();
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['column']);
        } else {
            $this->db->order_by('transaksi.id', 'desc');
        }
        
        
    }

    function make_datatables($tipe_rawat)
    {
        $this->make_query($tipe_rawat);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data($tipe_rawat)
    {
        $this->make_query($tipe_rawat);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data($tipe_rawat)
    {
        $this->table = 'transaksi';
        $this->order_column = array(null, 'pasien.no_mr', 'pasien.nama', 'pasien.no_telp');
        $this->db->select(array(
            'transaksi.id', 'detail_transaksi.created_at as tgl_rekam',
            'pasien.nama', 'pasien.no_mr', 'pasien.tanggal_lahir', 'pasien.no_telp', 'pasien.kecamatan', 'pasien.kelurahan', 'pasien.rt', 'pasien.rw',
            'transaksi.no_bill', 'transaksi.created_at as tanggal_transaksi', 'transaksi.jenis_rawat', 'transaksi.total_tarif',
            'transaksi.pasien_id', 'transaksi.status'
        ));

        $this->db->from($this->table);
        $this->db->join('detail_transaksi', 'detail_transaksi.transaksi_id = transaksi.id');
        $this->db->where('transaksi.jenis_rawat', $tipe_rawat);
        $this->db->join('pasien', 'pasien.id = transaksi.pasien_id');
        $this->db->group_by('transaksi.no_bill');
        return $this->db->count_all_results();
    }
}
