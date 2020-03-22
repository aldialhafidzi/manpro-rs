<?php
class RekamMedisModel extends MY_Model
{
    public function __construct()
    {
        $this->table = 'rekam_medis';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_one['penyakit'] = array('PenyakitModel', 'id', 'penyakit_id');
        $this->has_one['pasien'] = array('PasienModel', 'id', 'pasien_id');
        $this->has_one['dokter'] = array('DokterModel', 'id', 'dokter_id');
        parent::__construct();
    }

    function find($pasien_id)
    {
        $this->table = 'rekam_medis';
        $this->order_column = array(null, 'pasien.no_mr', 'pasien.nama', 'pasien.no_telp', 'pasien.kelurahan', 'penyakit.nama');
        $this->db->select(array(
            'rekam_medis.id',
            'pasien.id as pasien_id',
            'pasien.no_mr', 'pasien.nama as nama_pasien', 'pasien.no_telp', 'pasien.tanggal_lahir', 'pasien.kecamatan', 'pasien.kelurahan', 'pasien.rt', 'pasien.rw',
            'penyakit.nama as nama_penyakit'
        ));

        $this->db->from($this->table);
        $this->db->join('pasien', 'pasien.id = rekam_medis.pasien_id');
        $this->db->join('penyakit', 'penyakit.id = rekam_medis.penyakit_id');
        $this->db->join('dokter', 'dokter.id = rekam_medis.dokter_id');
        $this->db->where('rekam_medis.pasien_id', $pasien_id);

        return $this->db->get()->result_array();
    }

    function make_query($jenis_rawat)
    {
        $this->table = 'rekam_medis';
        $this->order_column = array(null, 'pasien.no_mr', 'pasien.nama', 'pasien.no_telp', 'pasien.kelurahan', 'penyakit.nama');
        $this->db->select(array(
            'rekam_medis.id',
            'pasien.id as pasien_id',
            'pasien.no_mr', 'pasien.nama as nama_pasien', 'pasien.no_telp', 'pasien.tanggal_lahir', 'pasien.kecamatan', 'pasien.kelurahan', 'pasien.rt', 'pasien.rw',
            'penyakit.nama as nama_penyakit'
        ));

        $this->db->from($this->table);
        $this->db->join('pasien', 'pasien.id = rekam_medis.pasien_id');
        $this->db->join('penyakit', 'penyakit.id = rekam_medis.penyakit_id');
        $this->db->group_by('rekam_medis.pasien_id');
        $this->db->where('rekam_medis.jenis_rawat', $jenis_rawat);

        if (isset($_POST['search']['value']) && $_POST['search']['value'] !== '') {
            $this->db->group_start();
            $this->db->like("pasien.no_mr", $_POST['search']['value']);
            $this->db->or_like("pasien.nama", $_POST['search']['value']);
            $this->db->or_like("pasien.no_telp", $_POST['search']['value']);
            $this->db->or_like("pasien.kelurahan", $_POST['search']['value']);
            $this->db->or_like("penyakit.nama", $_POST['search']['value']);
            $this->db->group_end();
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['column']);
        } else {
            $this->db->order_by('rekam_medis.id', 'desc');
        }
    }

    function make_datatables($jenis_rawat)
    {
        $this->make_query($jenis_rawat);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data($jenis_rawat)
    {
        $this->make_query($jenis_rawat);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data($jenis_rawat)
    {
        $this->table = 'rekam_medis';
        $this->order_column = array(null, 'pasien.no_mr', 'pasien.nama', 'pasien.no_telp', 'pasien.kelurahan', 'penyakit.nama');
        $this->db->select(array(
            'rekam_medis.id',
            'pasien.no_mr', 'pasien.nama as nama_pasien', 'pasien.no_telp', 'pasien.tanggal_lahir', 'pasien.kecamatan', 'pasien.kelurahan', 'pasien.rt', 'pasien.rw',
            'penyakit.nama as nama_penyakit'
        ));

        $this->db->from($this->table);
        $this->db->join('pasien', 'pasien.id = rekam_medis.pasien_id');
        $this->db->join('penyakit', 'penyakit.id = rekam_medis.penyakit_id');
        $this->db->group_by('rekam_medis.pasien_id');
        $this->db->where('rekam_medis.jenis_rawat', $jenis_rawat);

        return $this->db->count_all_results();
    }
}
