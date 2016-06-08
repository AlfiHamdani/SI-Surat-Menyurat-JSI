<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_m');
	}

	public function index()
	{
		$this->load->view('main');
		
	}

	public function save()
	{
		$url = $this->do_upload();
		$no = $_POST["no"];
		$tgl = $_POST["tgl"];
		$asal = $_POST["asal"];
		$tujuan = $_POST["tujuan"];
		$perihal = $_POST["perihal"];
		$jenis_surat = $_POST["jenis"];
		$this->main_m->save($jenis_surat,$tujuan,$asal,$tgl,$no, $perihal, $url);
	}

	public function do_upload()
	{
		$type = explode('.', $_FILES["berkas"]["name"]);
		$type = $type[count($type)-1];
		$url = "./files/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("pdf")))
		if(is_uploaded_file($_FILES["berkas"]["tmp_name"]))
			if(move_uploaded_file($_FILES["berkas"]["tmp_name"],$url));
				return $url;
			return "";
	}
}
