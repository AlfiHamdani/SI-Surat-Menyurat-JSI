<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function tampil_kotak_masuk()
	{
		$id = $this->session->userdata('u_id');
		$data = $this->db->query("SELECT a.*, b.*,c.*,d.* FROM surat_masuk as a, tb_jenis_surat as b, disposisi as c, user as d WHERE a.jenis_id=b.jenis_id AND a.id_suma=c.id_suma AND c.id_user=d.u_id AND u_id=$id AND a.status='1'");
		return $data;
		// $data = $this->db->query("SELECT a.id_suma, a.tgl_surat, a.asal_surat, a.perihal, a.file_surat FROM surat_masuk as a");
		// return $data;
	}

	public function tampil_list_permintaan()
	{
		$id = $this->session->userdata('u_id');
		$data = $this->db->query("SELECT c.nama, c.nim, b.nama_jenis, a.no_surat, a.tgl_surat, a.disetujui, d.* FROM surat_keluar as a, jenis_suke as b, surat_orang as c, user as d WHERE a.id_jenis=b.id_jenis AND a.id_suke=c.id_surat AND a.id_user=d.u_id AND u_id=$id GROUP BY a.no_surat HAVING ( COUNT(a.no_surat) >= 1 )");
		return $data;
	}

	public function tampil_ubah_pass()
	{
		$user = $this->session->userdata('u_id');
		$data = $this->db->query('select * from user where u_id='.$user);
		return $data;
	}

	public function hapus_akun($id)
	{
		return $this->db->delete('user', array('u_id' => $id));
	}

	public function insert($data)
	{
		return $this->db->insert('user', $data);
	}

}

