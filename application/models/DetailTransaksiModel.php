<?php
class DetailTransaksiModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'detail_transaksi';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_one['bed'] = array('BedModel', 'id', 'bed_id');
        $this->has_one['kamar'] = array('KamarModel', 'id', 'kamar_id');
        $this->has_one['ruangan'] = array('RuanganModel', 'id', 'ruangan_id');
        $this->has_one['obat'] = array('ObatModel', 'id', 'obat_id');
        $this->has_one['tindakan'] = array('TindakanModel', 'id', 'tindakan_id');
        $this->has_one['penyakit'] = array('PenyakitModel', 'id', 'penyakit_id');
        $this->has_one['transaksi'] = array('TransaksiModel', 'id', 'transaksi_id');
        $this->has_one['jadwal_dokter'] = array('JadwalDokterModel', 'id', 'jadwal_dokter_id');
        parent::__construct();
    }

    function find($jenis_rawat, $pasien_id)
    {
        $this->table = 'detail_transaksi';
        $this->db->select(array(
            'detail_transaksi.id', 'detail_transaksi.created_at as tgl_rekam', 'detail_transaksi.tarif_pendaftaran', 'detail_transaksi.tarif_dokter', 'detail_transaksi.tarif_tindakan', 'detail_transaksi.tarif_kamar',  'transaksi.total_tarif',
            'penyakit.nama as diagnosa',
            'pasien.nama', 'pasien.no_mr', 'pasien.tanggal_lahir', 'pasien.no_telp', 'pasien.kelurahan', 'pasien.rt', 'pasien.rw',
            'dokter.nama as nama_dokter',
            'transaksi.no_bill', 'transaksi.created_at as tanggal_transaksi', 'transaksi.jenis_rawat',
        ));

        $this->db->from($this->table);
        $this->db->join('transaksi', 'transaksi.id = detail_transaksi.transaksi_id');
        $this->db->join('pasien', 'pasien.id = transaksi.pasien_id');
        $this->db->join('penyakit', 'penyakit.id = detail_transaksi.penyakit_id');
        $this->db->join('jadwal_dokter', 'jadwal_dokter.id = detail_transaksi.jadwal_dokter_id', 'left');
        $this->db->join('dokter', 'dokter.id = jadwal_dokter.dokter_id', 'left');
        $this->db->where('transaksi.pasien_id', $pasien_id);
        $this->db->where('transaksi.jenis_rawat', $jenis_rawat);

        return $this->db->get()->result_array();
    }


    function make_query($tipe_rawat)
    {
        $this->table = 'detail_transaksi';
        $this->order_column = array(null, 'pasien.no_mr', 'pasien.nama', 'pasien.no_telp');
        $this->db->select(array(
            $tipe_rawat == 'RAWAT-IGD' ? 'bed.kode as no_bed' : '',
            'transaksi.id', 'detail_transaksi.created_at as tgl_rekam',
            'pasien.nama', 'pasien.no_mr', 'pasien.tanggal_lahir', 'pasien.no_telp', 'pasien.kecamatan', 'pasien.kelurahan', 'pasien.rt', 'pasien.rw',
            'transaksi.no_bill', 'transaksi.created_at as tanggal_transaksi', 'transaksi.jenis_rawat', 'transaksi.pasien_id', 'transaksi.total_tarif',
            'transaksi.status'
        ));

        $this->db->from($this->table);
        $this->db->join('transaksi', 'transaksi.id = detail_transaksi.transaksi_id');

        if ($tipe_rawat == 'RAWAT-IGD') {
            $this->db->join('bed', 'bed.id = detail_transaksi.bed_id');
        }

        $this->db->join('pasien', 'pasien.id = transaksi.pasien_id');
        if ($tipe_rawat) {
            $this->db->where('transaksi.jenis_rawat', $tipe_rawat);
        }
        $this->db->group_by('pasien.id');

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
            $this->db->order_by('detail_transaksi.id', 'desc');
        }
    }

    function make_datatables($tipe_rawat)
    {
        $this->make_query($tipe_rawat ? $tipe_rawat : null);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data($tipe_rawat)
    {
        $this->make_query($tipe_rawat ? $tipe_rawat : null);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data($tipe_rawat)
    {
        $this->table = 'detail_transaksi';
        $this->order_column = array(null, 'pasien.no_mr', 'pasien.nama', 'pasien.no_telp');
        $this->db->select(array(
            $tipe_rawat == 'RAWAT-IGD' ? 'bed.kode as no_bed' : '',
            'transaksi.id', 'detail_transaksi.created_at as tgl_rekam',
            'pasien.nama', 'pasien.no_mr', 'pasien.tanggal_lahir', 'pasien.no_telp', 'pasien.kecamatan', 'pasien.kelurahan', 'pasien.rt', 'pasien.rw',
            'transaksi.no_bill', 'transaksi.created_at as tanggal_transaksi', 'transaksi.jenis_rawat', 'transaksi.total_tarif',
            'transaksi.pasien_id', 'transaksi.status'
        ));

        $this->db->from($this->table);
        $this->db->join('transaksi', 'transaksi.id = detail_transaksi.transaksi_id');

        if ($tipe_rawat == 'RAWAT-IGD') {
            $this->db->join('bed', 'bed.id = detail_transaksi.bed_id');
        }

        if ($tipe_rawat) {
            $this->db->where('transaksi.jenis_rawat', $tipe_rawat);
        }
        $this->db->join('pasien', 'pasien.id = transaksi.pasien_id');
        $this->db->group_by('pasien.id');
        return $this->db->count_all_results();
    }
}
