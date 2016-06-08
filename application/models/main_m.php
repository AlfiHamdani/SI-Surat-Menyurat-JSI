<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_m extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	public function save($jenis_surat,$tujuan,$asal,$tgl,$no, $perihal, $url)
	{
		$this->db->set('jenis_id', $jenis_surat);
		$this->db->set('tujuan_surat', $tujuan);
		$this->db->set('asal_surat', $asal);
		$this->db->set('tgl_surat', $tgl);
		$this->db->set('no_surat', $no);
		$this->db->set('perihal', $perihal);
		$this->db->set('file_surat', $url);
		$this->db->insert('surat_masuk');
	}
	
}
