<?php class Hotline_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/*
	 * nomer untuk ditampilkan di widget nomer berjalan di web
	*/
	public function isi_hotline()
	{
		$data = $this->db->select('nama, nomer')
			->where('status', 1)
			->order_by('urut')
			->from('hotline')
			->get()
			->result_array();
		return $data;
	}

	public function get_teks($id='')
	{
		$data = $this->db->select('t.*')
			->where('t.id', $id)
			->from('hotline t')
			->get()->row_array();
		$data['nama'] = strip_tags($data['nama']);
		return $data;
	}

	public function get_teks_aktif()
	{
		$data = $this->db->where('status', 1)->
			order_by('urut')->
			get('nama')->result_array();
		return $data;
	}

	private function list_data_sql()
	{
		$sql = " FROM hotline t WHERE 1";
		return $sql;
	}

	public function list_data()
	{
		$order_sql = ' ORDER BY urut';

		$sql = "SELECT t.*" . $this->list_data_sql();
		$sql .= $order_sql;

		$query = $this->db->query($sql);
		$data = $query->result_array();

		for ($i=0; $i<count($data); $i++)
		{
			$data[$i]['no'] = $i + 1;

			if ($data[$i]['status'] == 1)
				$data[$i]['aktif'] = "Ya";
			else
			{
				$data[$i]['aktif'] = "Tidak";
				$data[$i]['status'] = 2;
			}
			$nama = strip_tags($data[$i]['nama']);
			if (strlen($nama) > 150)
			{
				$abstrak = substr($nama,0,150)."...";
			}
			else
			{
				$abstrak = $nama;
			}
			$data[$i]['nama'] = $abstrak;
		}
		return $data;
	}
	
	public function delete($id='')
	{
		$outp = $this->db->where('id', $id)->delete('hotline');
		if (!$outp) $this->session->success = -1;
	}

	public function delete_all()
	{
		$id_cb = $_POST['id_cb'];

		foreach ($id_cb as $id)
		{
			$this->delete($id);
		}
	}
	public function lock($id='', $val=0)
	{
		$this->db->where('id', $id)->update('hotline', array('status' => $val));
	}

  private function urut_max()
  {
    $this->db->select_max('urut');
    $query = $this->db->get('hotline');
    $teks = $query->row_array();
    return $teks['urut'];
  }

	private function urut_semua()
	{
		$sql = "SELECT urut, COUNT(*) c FROM hotline GROUP BY urut HAVING c > 1";
		$query = $this->db->query($sql);
		$urut_duplikat = $query->result_array();
		if ($urut_duplikat)
		{
			$this->db->select("id");
			$this->db->order_by("urut");
			$q = $this->db->get('hotline');
			$teks = $q->result_array();
			for ($i=0; $i<count($teks); $i++)
			{
				$this->db->where('id', $teks[$i]['id']);
				$data['urut'] = $i + 1;
				$this->db->update('hotline', $data);
			}
		}
	}

	/**
	 * @param $id Id teks
	 * @param $arah Arah untuk menukar dengan teks: 1) bawah, 2) atas
	 * @return int Nomer urut teks lain yang ditukar
	 */
	public function urut($id, $arah)
	{
		$this->urut_semua();
		$this->db->where('id', $id);
		$q = $this->db->get('hotline');
		$teks1 = $q->row_array();

		$this->db->select("id, urut");
		$this->db->order_by("urut");
		$q = $this->db->get('hotline');
		$teks = $q->result_array();
		for ($i=0; $i<count($teks); $i++)
		{
			if ($teks[$i]['id'] == $id)
				break;
		}

		if ($arah == 1)
		{
			if ($i >= count($teks) - 1) return;
			$teks2 = $teks[$i + 1];
		}
		if ($arah == 2)
		{
			if ($i <= 0) return;
			$teks2 = $teks[$i - 1];
		}

		// Tukar urutan
		$this->db->where('id', $teks2['id'])->
			update('hotline', array('urut' => $teks1['urut']));
		$this->db->where('id', $teks1['id'])->
			update('hotline', array('urut' => $teks2['urut']));

		return (int)$teks2['urut'];
	}

	private function sanitise_data($data)
	{
		$data['nama'] = strip_tags($data['nama']);
		$data['nomer'] = $data['nomer'];
		return $data;
	}

	public function insert()
	{
		$this->session->success = 1;
		$this->session->error_msg = 'aaaaaaaaaaaaa';

//		$data = $this->input->post();
		$data['status'] = 2;
		$data['nama'] = $this->input->post('nama');
		$data['nomer'] = $this->input->post('nomer');
		// insert baru diberi urutan terakhir
		$data['urut'] = $this->urut_max() + 1;
//		$data = $this->sanitise_data($data);
		$outp = $this->db->insert('hotline', $data);
		if (!$outp) $this->session->success = -1;
	}
	public function update($id=0)
	{
		$this->session->success = 1;
		$this->session->error_msg = '';

		$data = $this->input->post();

		$data = $this->sanitise_data($data);
		$this->db->where('id', $id);
		$outp = $this->db->update('hotline', $data);
		if (!$outp) $this->session->success = -1;
	}

///akhirrrrrr	
}
?>
