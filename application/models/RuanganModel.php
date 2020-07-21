<?php
class RuanganModel extends MY_Model
{   
    var $table = 'ruangan';
	var $column_order = array('id','kode','nama','kelas','harga','status','created_at','updated_at',null); //set column field database for datatable orderable
    var $column_search = array('kode','nama','status'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id' => 'asc');

    public function __construct()
    {
        $this->table = 'ruangan';
        $this->primary_key = 'id';
        $this->soft_deletes = false;
        $this->has_many['kamar'] = array('KamarModel', 'ruangan_id', 'id');
        parent::__construct();
        $this->load->database();

    }

    private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_detail_ruangan()
	{
		$this->db->select('detail_transaksi.transaksi_id, transaksi.jenis_rawat, pasien.no_mr, pasien.nama, pasien.jenis_kelamin, pasien.no_telp, ruangan.kode as r_kode, ruangan.nama as r_nama, ruangan.kelas, kamar.kode as k_kode, bed.kode');
		$this->db->from('bed');
		$this->db->join('kamar', 'bed.kamar_id=kamar.id');
		$this->db->join('ruangan', 'kamar.ruangan_id=ruangan.id');
		$this->db->join('detail_transaksi', 'ruangan.id=detail_transaksi.ruangan_id');
		$this->db->join('transaksi', 'detail_transaksi.transaksi_id=transaksi.id');
		$this->db->join('pasien', 'transaksi.pasien_id=pasien.id');
		$this->db->where('jenis_rawat="RAWAT-INAP"');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ruangan_exe(){
		$this->db->select('ruangan.nama, ruangan.kelas, kamar.kode as k_kode, bed.kode as b_kode, bed.`status`');
		$this->db->from('bed');
		$this->db->join('kamar', 'bed.kamar_id=kamar.id');
		$this->db->join('ruangan', 'kamar.ruangan_id=ruangan.id');
		$this->db->where('ruangan.kelas = "EXECUTIVE"');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ruangan_eko(){
		$this->db->select('ruangan.nama, ruangan.kelas, kamar.kode as k_kode, bed.kode as b_kode, bed.`status`');
		$this->db->from('bed');
		$this->db->join('kamar', 'bed.kamar_id=kamar.id');
		$this->db->join('ruangan', 'kamar.ruangan_id=ruangan.id');
		$this->db->where('ruangan.kelas = "EKONOMI"');
		$query = $this->db->get();
		return $query->result();
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_by_status($status)
	{
		$this->get_detail_ruangan();
		$this->db->where('status',$status);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update_data($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
}
