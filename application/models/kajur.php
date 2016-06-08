<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kajur extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tampil_ubah_pass()
	{
		$user = $this->session->userdata('u_id');
		$data = $this->db->query('select * from user where u_id='.$user);
		return $data;
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

	public function disposisi()
	{
		$editdata = $this->db->query("SELECT a.id_suma, a.tgl_surat, a.asal_surat, a.perihal, a.file_surat, b.* FROM surat_baru as a, disposisi as b WHERE a.id_suma=b.id_suma");
		return $editdata;
		//$data = $this->db->get('disposisi');
	}

	public function tampil_permohonan()
	{
		$data = $this->db->query("SELECT c.nama, c.nim, b.nama_jenis, a.*, d.* FROM surat_keluar as a, jenis_suke as b, surat_orang as c, user as d WHERE a.id_jenis=b.id_jenis AND a.id_user=d.u_id GROUP BY a.no_surat HAVING ( COUNT(a.no_surat) >= 1 )");
		return $data;
	}

	public function persetujuan()
	{
		$data = $this->db->get('surat_keluar')->result();
	}

	public function proses_persetujuan()
	{
		$baru =  $this->input->post('status');
		$data = mysql_query("UPDATE surat_keluar set disetujui='".$baru."'");
	}

	public function template_surat($a)
	{
		$data = $this->db->query("SELECT a.nama, a.nim, b.nama_jenis, c.* FROM surat_orang as a, jenis_suke as b, surat_keluar as c WHERE c.id_jenis=b.id_jenis AND c.id_suke=a.id_surat AND c.id_suke= $a");
		return $data;
	}
}