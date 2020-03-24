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
}
