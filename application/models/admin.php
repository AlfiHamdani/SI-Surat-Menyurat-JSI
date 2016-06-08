<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function tampil_manage_akun()
	{
		$data = $this->db->get('user');
		return $data;
	}

	public function tampil_jenis_masuk()
	{
		return $this->db->get('tb_jenis_surat');
	}

	public function tampil_jenis_keluar()
	{
		return $this->db->get('jenis_suke');
	}

	public function tampil_surat_masuk()
	{
		$data = $this->db->query("SELECT a.*, b.jenis_id, b.jenis_surat FROM surat_masuk as a, tb_jenis_surat as b WHERE a.jenis_id=b.jenis_id");
		return $data;
	}

	public function tampil_surat_baru()
	{
		$data = $this->db->query("SELECT a.*, b.jenis_id, b.jenis_surat FROM surat_masuk as a, tb_jenis_surat as b WHERE a.jenis_id=b.jenis_id AND a.status='0'");
		return $data;
	}

	public function tampil_surat_keluar()
	{
		$data = $this->db->query("SELECT a.nama, a.nim, b.nama_jenis, c.*, d.* FROM surat_orang as a, jenis_suke as b, surat_keluar as c, user as d WHERE c.id_jenis=b.id_jenis AND c.id_suke=a.id_surat AND c.id_user=d.u_id AND c.disetujui='0' GROUP BY c.no_surat HAVING ( COUNT(c.no_surat) >= 1 )");
		return $data;
	}

	public function surat_ditolak()
	{
		$data = $this->db->query("SELECT a.nama, a.nim, b.nama_jenis, c.no_surat, c.tgl_surat, c.disetujui, d.* FROM surat_orang as a, jenis_suke as b, surat_keluar as c, user as d WHERE c.id_jenis=b.id_jenis AND c.id_suke=a.id_surat AND c.id_user=d.u_id AND c.disetujui='1' GROUP BY c.no_surat HAVING ( COUNT(c.no_surat) >= 1 )");
		return $data;
	}

	public function tampil_permohonan()
	{
		//$id = $this->session->userdata('u_id');
		$data = $this->db->query("SELECT c.nama, c.nim, b.nama_jenis, a.no_surat, a.tgl_surat, a.disetujui, d.* FROM surat_keluar as a, jenis_suke as b, surat_orang as c, user as d WHERE a.id_jenis=b.id_jenis AND a.id_suke=c.id_surat AND a.id_user=d.u_id AND a.disetujui='2' GROUP BY a.no_surat HAVING ( COUNT(a.no_surat) >= 1 )");
		return $data;
	}

	public function hapus_akun($id)
	{
		return $this->db->delete('user', array('u_id' => $id));
	}

	public function hapus_jenis($id)
	{
		return $this->db->delete('tb_jenis_surat', array('jenis_id' => $id));
	}

	public function hapus_jenis_sk($id)
	{
		return $this->db->delete('jenis_suke', array('id_jenis' => $id));
	}

	public function hapus_surat_masuk($id)
	{
		return $this->db->delete('surat_masuk', array('id_suma' => $id));
	}

	public function hapus_surat_baru($id)
	{
		return $this->db->delete('surat_baru', array('id_suma' => $id));
	}

	public function insert($data)
	{
		return $this->db->insert('user', $data);
	}

	public function template_surat($a)
	{
		$data = $this->db->query("SELECT a.nama, a.nim, b.nama_jenis, c.* FROM surat_orang as a, jenis_suke as b, surat_keluar as c WHERE c.id_jenis=b.id_jenis AND c.id_suke=a.id_surat  AND c.id_suke= $a");
		return $data;
	}
}
