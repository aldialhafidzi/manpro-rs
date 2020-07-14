<?php

class m_igd extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('igd_bed');
    }
    public function tampil_dataobat()
    {
        $this->db->select('*');
        $this->db->from('igd_inventory');
        $this->db->where('jenis', 'obat');
        $query = $this->db->get();
        return $query->result();
    }
    public function input_datatr($data)
    {
        $this->db->insert('igd_transaksi', $data);
    }

    public function tampil_datatindakan()
    {
        $this->db->select('*');
        $this->db->from('igd_inventory');
        $this->db->where('jenis', 'Tindakan');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_datainventory()
    {
        return $this->db->get('igd_inventory')->result();
    }

    public function tampil_pasien()
    {
        return $this->db->get('igd_pasien')->result();
    }

    public function tampil_datajadwaldokter()
    {
        return $this->db->get('igd_jadwaldokter')->result();
    }
    public function tampil_datajadwalperawat()
    {
        return $this->db->get('igd_jadwalperawat')->result();
    }

    public function countbed()
    {
        $sql = "SELECT count(id) as id FROM igd_bed WHERE kondisi='Kosong'";
        $result = $this->db->query($sql);
        return $result->row()->id;
    }

    public function countbed2()
    {
        $sql = "SELECT count(id) as id FROM igd_bed WHERE kondisi='Terisi'";
        $result = $this->db->query($sql);
        return $result->row()->id;
    }

    public function input_data($data)
    {
        $this->db->insert('tb_mahasiswa', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function kosongkan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function idpasienbaru()
    {
        $sql = "SELECT MAX(id_pasien) as idpasien from igd_pasien";
        $result = $this->db->query($sql);
        return $result->row()->idpasien;
    }

    public function idrekambaru()
    {
        $sql = "SELECT MAX(id_rekam_medis) as idrekam from igd_rekam_medis";
        $result = $this->db->query($sql);
        return $result->row()->idrekam;
    }

    public function input_daftarigd($data)
    {
        $this->db->insert('igd_pasien', $data);
    }

    public function input_daftarigd3($data)
    {
        $this->db->insert('igd_rekam_medis', $data);
    }

    public function input_daftarigd2($where, $data2, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data2);
    }
    public function duatable()
    {
        $this->db->select('*');
        $this->db->from('igd_bed');
        $this->db->join('igd_pasien', 'igd_bed.id_pasien=igd_pasien.id_pasien', 'LEFT');
        $query = $this->db->get();
        return $query->result();
    }
    public function pasien()
    {
        $this->db->select('*');
        $this->db->from('igd_rekam_medis');
        $this->db->join('igd_pasien', 'igd_rekam_medis.id_pasien=igd_pasien.id_pasien');
        $query = $this->db->get();
        return $query->result();
    }


    public function beddetail($id)
    {
        $this->db->select('*');
        $this->db->from('igd_bed');
        $this->db->join('igd_pasien', 'igd_bed.id_pasien=igd_pasien.id_pasien', 'LEFT');
        $this->db->join('igd_rekam_medis', 'igd_rekam_medis.id_pasien=igd_pasien.id_pasien', 'LEFT');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function beddetailtransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('igd_bed');
        $this->db->join('igd_pasien', 'igd_bed.id_pasien=igd_pasien.id_pasien', 'LEFT');
        $this->db->join('igd_rekam_medis', 'igd_rekam_medis.id_pasien=igd_pasien.id_pasien', 'LEFT');
        $this->db->join('igd_transaksi', 'igd_transaksi.id_rekam_medis=igd_rekam_medis.id_rekam_medis', 'RIGHT');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function rm($id_rekam_medis)
    {
        $this->db->select('*');
        $this->db->from('igd_transaksi');
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $query = $this->db->get();
        return $query->result();
    }

    public function rm2($id_rekam_medis)
    {
        $this->db->select('*');
        $this->db->from('igd_rekam_medis');
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $query = $this->db->get();
        return $query->result();
    }

    public function rm3($id_rekam_medis)
    {
        $this->db->select('*');
        $this->db->from('igd_pasien');
        $this->db->join('igd_rekam_medis', 'igd_rekam_medis.id_pasien=igd_pasien.id_pasien', 'LEFT');
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $query = $this->db->get();
        return $query->result();
    }

    public function rm4($id_rekam_medis)
    {
        $this->db->select('*');
        $this->db->from('igd_transaksi');
        $this->db->join('obat', 'igd_transaksi.layanan=obat.id_obat', 'LEFT');
        $this->db->join('igd_inventory', 'igd_transaksi.layanan=igd_inventory.id_inventory', 'LEFT');
        $this->db->where('id_rekam_medis', $id_rekam_medis);
        $query = $this->db->get();
        return $query->result();
    }

    public function total($id_rekam_medis)
    {
        $this->db->select('sum((harga_inv)*jumlah)');
        $this->db->from('igd_transaksi');
        $this->db->join('igd_inventory', 'igd_transaksi.layanan=igd_inventory.id_inventory', 'LEFT');
        $this->db->where('id_rekam_medis', $id_rekam_medis);

        $query = $this->db->get();



        $row = $query->row();
        return $row;

        //    $sql ="SELECT sum(harga_inv)*jumlah from igd_transaksi left join igd_inventory on igd_transaksi.layanan=igd_inventory.id_inventory
        // whe='$id_rekam_medis'";
        // // var_dump($sql);die();

        //    $result =$this->db->query($sql);
        // var_dump($row);die();
        //    return $result;
    }

    // public function beddetail($id = id) 
    // {
    //  $this->db->select('*');
    //  $this->db->from('igd_bed');
    //  $this->db->join('igd_pasien','igd_bed.id_pasien=igd_pasien.id_pasien','LEFT');
    //  $this->db->where('id', $id);
    //  $query = $this->db->get();
    // return $query->result();
    // }

    // select *
    // from igd_bed
    // join igd_pasien igd_bed.id_pasien=igd_pasien.id_pasien 
    // join igd_rekam_medis igd_rekam_medis.id_pasien=igd_pasien.id_pasien 
    // join igd_transaksi igd_transaksi.id_rekam_medis=igd_rekam_medis.id_rekam_medis 
    // where id

}
