<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_kajur extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('kajur');
		$this->load->library('form_validation');
	}

	public function index() {
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
        	$data['permohonan']	= $this->kajur->tampil_permohonan()->num_rows();
			$data['page']		= "home";
			$data['surat_baru'] = $this->kajur->tampil_surat_baru()->num_rows();
			//$data['form_disposisi'] = $this->kajur->disposisi()->num_rows();
			$this->load->view('kajur/kajur_dash', $data);
        }
	}

	public function ubah_pass()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['editdata']	= $this->kajur->tampil_ubah_pass()->result_object();
	    	$data['page']	= "ubah_pass";	

	    	$this->load->view('kajur/kajur_dash',$data);
        }
	}

	public function proses_ubah_pass()
	{
		$id = $this->session->userdata('u_id');
		$lama = md5(mysql_real_escape_string($this->input->post('lama')));
		$cek = mysql_query("SELECT * FROM user WHERE u_id =  $id && u_paswd = '".$lama."'");
		$baru =  md5(mysql_real_escape_string($this->input->post('baru')));
		$konfirmasi_baru = md5(mysql_real_escape_string($this->input->post('konfirmasi')));
		if(mysql_num_rows($cek)==0){
			 redirect('c_kajur/tidak_sesuai');
		}
		else{
			if ($baru != $konfirmasi_baru) {     // apabila input dari password baru tidak sama dengan konfirmasinya
				redirect('c_kajur/harus_sama');
			}
			else{		// apabila berhasil
				$berhasil = mysql_query("UPDATE user set u_paswd='".$baru."' WHERE u_id=$id");
				redirect('c_kajur/berhasil');
			}

		}
		// print_r(mysql_num_rows($cek));
	}

	function berhasil(){}
	function tidak_sesuai(){}
	function harus_sama(){}

	/* Fungsi Surat Masuk */
	public function arsip_surat_masuk()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
			$data['data']	= $this->kajur->tampil_surat_masuk()->result_object();
	    	$data['page'] = "arsip_sm";
	    	$this->load->view('kajur/kajur_dash',$data);
        }    
	}

	public function surat_baru()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['data']	= $this->kajur->tampil_surat_baru()->result_object();
	    	$data['page']	= "surat_baru";

	    	$this->load->view('kajur/kajur_dash',$data);
        }
	}

	public function disposisi()
	{
		//$data['editdata']	= $this->db->get('disposisi')->result_object();
    	$data['page']	= "form_disposisi";
    	$this->load->view('kajur/kajur_dash',$data);
	}

	public function proses()
	{
		$id = $this->input->post('id');
		$tujuan = $this->input->post('tujuan');
		$tgl = $this->input->post('tgl');
		$isi = $this->input->post('isi');
		$tindak = $this->input->post('tindak');
		$object = array(
				'id_suma' => $id,
				'id_user' => $tujuan,
				'tgl_disposisi' => $tgl,
				'isi_disposisi' => $isi,
				'tindak_lanjut' => $tindak
			);
		$this->db->insert('disposisi',$object);

		$status = $this->input->post('status');
		$object2 = array(
			'status' => $status
			);
		$this->db->where('id_suma',$id);
		$this->db->update('surat_masuk', $object2); 
		redirect('c_kajur/surat_baru','refresh');
	}


	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

    /* Fungsi SUrat Keluar */
    function arsip_surat_keluar(){
    	if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
			$data['data']	= $this->kajur->tampil_surat_keluar()->result_object();
	    	$data['page'] = "arsip_sk";
	    	$this->load->view('kajur/kajur_dash',$data);
        }    	
    }

    function permohonan()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
			$data['data']	= $this->kajur->tampil_permohonan()->result_object();
	    	$data['page'] = "permohonan";
	    	$this->load->view('kajur/kajur_dash',$data);
        }    
	}

	function setujui()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
         else {
		$data['page']	= "form_persetujuan";
    	$this->load->view('kajur/form_persetujuan');
    	}
	}

	function proses_persetujuan()
	{
		$id = $this->input->post('no_surat');
		$data['no_surat'] 		= $this->input->post('no_surat');
		$status = $this->input->post('status');
		$object = array(
			'disetujui' => $status
			);
		$this->db->where('no_surat',$id);
		$this->db->update('surat_keluar', $object); 
		
		redirect('c_kajur/permohonan');
	}

	function template_surat()
	{
		$a= $this->uri->segment(3);
		$aa= $this->db->query("SELECT * FROM surat_keluar where id_suke=$a ")->result_array();
		$data['data'] = $this->kajur->template_surat($a)->result_object();
		if ($aa[0]['id_jenis'] == 1 ){
	   		$this->load->view('admin/template_surat.php',$data);
	   	}
	   	elseif($aa[0]['id_jenis'] ==2){
	   		$this->load->view('template/permohonan_dana.php',$data);
	   	}
	   	elseif ($aa[0]['id_jenis'] == 3) {
	   		$this->load->view('template/izin_tidak_kuliah.php',$data);
	   	}
	}
}
