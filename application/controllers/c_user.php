<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_user extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','download'));
		$this->load->model('user');
		$this->load->library('form_validation');
	}

	public function index() {
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
        	// $this->load->view('v_carikode');
        	$data['list_permintaan']	= $this->user->tampil_list_permintaan()->num_rows();
        	$data['kotak_masuk']	= $this->user->tampil_kotak_masuk()->num_rows();
			$data['page']			= "home";
			$this->load->view('user/user_dash', $data);
        }
	}

	function lihat($file_surat){
		$isi = file_get_contents(base_url().'files/'.$file_surat);
		$nama = "file_download.pdf";
		force_download($nama,$isi);
	}

	public function kotak_masuk()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['data']	= $this->user->tampil_kotak_masuk()->result_object();
	    	$data['page']	= "kotak_masuk";

	    	$this->load->view('user/user_dash',$data);
        }
	}

	public function list_permintaan()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['data']	= $this->user->tampil_list_permintaan()->result_object();
	    	$data['page']	= "list_permintaan";

	    	$this->load->view('user/user_dash',$data);
        }
	}

	public function ubah_pass()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['editdata']	= $this->user->tampil_ubah_pass()->result_object();
	    	$data['page']	= "edit_akun";	

	    	$this->load->view('user/user_dash',$data);
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
			 redirect('c_user/tidak_sesuai');
		}
		else{
			if ($baru != $konfirmasi_baru) {     // apabila input dari password baru tidak sama dengan konfirmasinya
				redirect('c_user/harus_sama');
			}
			else{		// apabila berhasil
				$berhasil = mysql_query("UPDATE user set u_paswd='".$baru."' WHERE u_id=$id");
				redirect('c_user/berhasil');
			}

		}
		// print_r(mysql_num_rows($cek));
	}

	function berhasil(){}
	function tidak_sesuai(){}
	function harus_sama(){}

	public function form_surat()
	{
		$data['page']	= "form_surat";
    	$this->load->view('user/form_surat');
	}

	public function add()
	{
		$tgl = $_POST["tgl"];
		$id = $this->session->userdata('u_id');
		$keperluan = $_POST["keperluan"];
		$kepada = $_POST["kepada"];
		$perihal = $_POST["perihal"];
		$jenis = $_POST["jenis"];
		$tgl_mulai = $_POST["tgl_mulai"];
		$tgl_akhir = $_POST["tgl_akhir"];
		$tempat = $_POST["tempat"];
		$dana = $_POST["dana"];
		$hari = $_POST["hari"];
		$waktu = $_POST["waktu"];

		$konek = mysqli_connect("localhost","root","root","tb_rpl");
		$hitung = "select count(no_surat) as total from surat_keluar";
		$jumlah = mysqli_query($konek,$hitung);
		$x = mysqli_fetch_array($jumlah);
		//echo $tgl;

		$tahun = explode("-", $tgl);
		$x['total'] = $x['total'] + 1;
		$no_surat = $x['total']."/UN.16.15.5.2/PP/".$tahun[0];
		$var_surat = $x['total']."-UN.16.15.5.2-PP-".$tahun[0];
		//echo $no_surat;

		$query = "INSERT INTO surat_keluar(no_surat,id_user,id_jenis,tgl_surat,keperluan,untuk,perihal,tgl_mulai,tgl_akhir,tempat,dana_bantuan,hari,waktu) 
		VALUES('$no_surat','$id','$jenis','$tgl','$keperluan','$kepada','$perihal','$tgl_mulai','$tgl_akhir','$tempat','$dana','$hari','$waktu')";
		mysqli_query($konek, $query);

		//$query->$this->input_orang();
		redirect('c_user/input_orang/'.$var_surat,'refresh');
	}

	public function input_orang($id)
	{
		$data['page']	= "input_orang";
		$data['id_surat'] = $id;
    	$this->load->view('user/input_orang',$data);
	}

	public function proses_input_orang()
	{
		$nama = $_POST["nama"];
		$nim  = $_POST["nim"];
		$no_surat  = $_POST["id_surat"];
		$url = $_POST['url_surat'];
		$konek = mysqli_connect("localhost","root","root","tb_rpl");
		$query = "INSERT INTO surat_orang(id_surat,nama,nim) VALUES('$no_surat','$nama','$nim')";
		mysqli_query($konek, $query);
		redirect('c_user/input_orang/'.$url,'refresh');
	}

	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
