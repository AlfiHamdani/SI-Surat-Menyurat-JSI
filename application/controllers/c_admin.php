<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('admin');
		$this->load->library('form_validation');
	}

    public function index() {
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {      	
        	$data['surat_ditolak']	= $this->admin->surat_ditolak()->num_rows();
        	$data['surat_masuk']	= $this->admin->tampil_surat_masuk()->num_rows();
			$data['surat_keluar']	= $this->admin->tampil_surat_keluar()->num_rows();
			$data['page']	= "home";

			$this->load->view('admin/admin_dash', $data);
        }
	}

	/* Fungsi Master */
	function manage_akun(){
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['data']	= $this->admin->tampil_manage_akun()->result_object();
	    	$data['page']	= "manage_akun";

	    	$this->load->view('admin/admin_dash',$data);
        }
	}

	function tambah_akun(){
		$data['page']	= "tambah_akun";
    	$this->load->view('admin/tambah_akun');
	}

	function insert_akun(){	
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('namalengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('nim','Nim','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
		
		if($this->form_validation->run() == FALSE){
			$data['page']	= "tambah_akun";
    		$this->load->view('admin/tambah_akun');
		}
		else{
			$userName = $this->input->post('username');
			$namaLengkap = $this->input->post('namalengkap');
			$nim = $this->input->post('nim');
			$ket = $this->input->post('keterangan');
			$object = array(
					'nama' => $namaLengkap,
					'u_name' => $userName,
					'u_paswd' => md5('12345'),
					'nim' => $nim,
					'role' => $ket
			);
			$query = $this->admin->insert($object);
			if($query){
				$this->session->set_flashdata('alert','Berhasil dimasukkan');
				redirect('c_admin/manage_akun','refresh');	
			}
		}
		
	}

	function edit_akun($id){
		$data['editdata']	= $this->db->get_where('user',array('u_id'=>$id))->result_object();		
		$data['page']	= "edit_akun";
		
		$this->load->view('admin/admin_dash', $data);
	}

	function update_akun(){
		$id = $this->input->post('id');
		$userName = $this->input->post('username');
		$namaLengkap = $this->input->post('namalengkap');
		$nim = $this->input->post('nim');
		$ket = $this->input->post('keterangan');
		$object = array(
				'nama' => $userName,
				'u_name' => $namaLengkap,
				'u_paswd' => md5('12345'),
				'nim' => $nim,
				'role' => $ket
			);
		$this->db->where('u_id', $id);
		$this->db->update('user', $object); 

		redirect('c_admin/manage_akun','refresh');
	}

	function hapus_akun($id){
		$this->admin->hapus_akun($id);
		redirect('c_admin/manage_akun','refresh');
	}

	function ubah_pass(){
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['data']	= $this->admin->tampil_manage_akun()->result_object();
	    	$data['page']	= "ubah_pass";

	    	$this->load->view('admin/admin_dash',$data);
        }
	}

	function update_pass(){
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$id = $this->input->post('id');
			$userName = $this->input->post('username');
			$namaLengkap = $this->input->post('namalengkap');
			$object = array(
					'nama' => $userName,
					'u_name' => $namaLengkap,
					'u_paswd' => md5('12345')
				);
			$this->db->where('u_id', $id);
			$this->db->update('user', $object); 

			redirect('c_admin/manage_akun','refresh');
        }
	}

	/* Fungsi Jenis Surat */
    function jenis_surat_masuk(){
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['data']	= $this->admin->tampil_jenis_masuk()->result_object();
	    	$data['page']	= "jenis_surat_masuk";

	    	$this->load->view('admin/admin_dash',$data);
        }
    }

    function tambah_jenis(){
    	$data['page']	= "tambah_jenis";
    	$this->load->view('admin/tambah_jenis_surat');
    }

    function insert_jenis(){
		$jenis = $this->input->post('jenis');
		$object = array(
				'jenis_surat' => $jenis
			);
		$this->db->insert('tb_jenis_surat', $object);

		redirect('c_admin/jenis_surat_masuk','refresh');
	}

	function hapus_jenis($id){
		$this->admin->hapus_jenis($id);
		redirect('c_admin/jenis_surat_masuk','refresh');
	}

	function edit_jenis($id){
		$data['editdata']	= $this->db->get_where('tb_jenis_surat',array('jenis_id'=>$id))->result_object();		
		$data['page']	= "edit_jenis_surat";
		
		$this->load->view('admin/admin_dash', $data);
	}

	function update_jenis(){
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$object = array(
				'jenis_surat' => $jenis
			);
		$this->db->where('jenis_id', $id);
		$this->db->update('tb_jenis_surat', $object); 

		redirect('c_admin/jenis_surat_masuk','refresh');
	}

	function jenis_surat_keluar(){
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
	    	$data['data']	= $this->admin->tampil_jenis_keluar()->result_object();
	    	$data['page']	= "jenis_surat_keluar";

	    	$this->load->view('admin/admin_dash',$data);
        }
	}

	function tambah_jenis_sk(){
    	$data['page']	= "tambah_jenis";
    	$this->load->view('admin/tambah_jenis_surat_k');
    }

    function insert_jenis_sk(){
		$jenis = $this->input->post('jenis');
		$object = array(
				'nama_jenis' => $jenis
			);
		$this->db->insert('jenis_suke', $object);

		redirect('c_admin/jenis_surat_keluar','refresh');
	}

	function hapus_jenis_sk($id){
		$this->admin->hapus_jenis_sk($id);
		redirect('c_admin/jenis_surat_keluar','refresh');
	}

	function edit_jenis_sk($id){
		$data['editdata']	= $this->db->get_where('jenis_suke',array('id_jenis'=>$id))->result_object();		
		$data['page']	= "edit_jenis_surat_k";
		
		$this->load->view('admin/admin_dash', $data);
	}

	function update_jenis_sk(){
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$object = array(
				'nama_jenis' => $jenis
			);
		$this->db->where('id_jenis', $id);
		$this->db->update('jenis_suke', $object); 

		redirect('c_admin/jenis_surat_keluar','refresh');
	}

	/* Fungsi Surat Masuk */
	function arsip_surat_masuk(){
    	if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
			$data['data']	= $this->admin->tampil_surat_masuk()->result_object();
	    	$data['page'] = "arsip_surat_masuk";
	    	$this->load->view('admin/admin_dash',$data);
        }    	
    }

    function edit_surat_masuk($id){
    	$data['editdata']	= $this->db->get_where('surat_masuk',array('id_suma'=>$id))->result_object();
    	$data['page']	= "edit_surat_masuk";
		$this->load->view('admin/admin_dash',$data);
    }

	function surat_baru(){
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
			$data['data']	= $this->admin->tampil_surat_baru()->result_object();
	    	$data['page'] = "surat_baru";
	    	$this->load->view('admin/admin_dash',$data);
        }  
	}

	function update_surat_masuk(){
 		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$no = $this->input->post('no');
		$tgl = $this->input->post('tgl');
		$asal = $this->input->post('asal');
		$tujuan = $this->input->post('tujuan');
		$perihal = $this->input->post('perihal');
		$object = array(
				'jenis_id' => $jenis,
				'no_surat' => $no,
				'tgl_surat' => $tgl,
				'asal_surat' => $asal,
				'tujuan_surat' => $tujuan,
				'perihal' => $perihal
			);
		$this->db->where('id_suma', $id);
		$this->db->update('surat_masuk', $object); 
		redirect('c_admin/arsip_surat_masuk','refresh');
 	}

 	function hapus_surat_masuk($id){
		$this->admin->hapus_surat_masuk($id);
		redirect('c_admin/arsip_surat_masuk','refresh');
	}

	function tambah_surat_baru(){
    	$data['page']	= "tambah_surat_baru";
		$this->load->view('admin/tambah_surat_baru');
    }

    public function add()
	{
		$jenis_surat = $_POST["jenis"];
		$tujuan = $_POST["tujuan"];
		$asal = $_POST["asal"];
		$tgl = $_POST["tgl"];
		$no = $_POST["no"];
		$perihal = $_POST["perihal"];

		$lokasi_file = $_FILES['berkas']['tmp_name'];
		$type   = $_FILES['berkas']['name'];

		// Tentukan folder untuk menyimpan file
		$folder = "./files/$type";

		// Apabila file berhasil di upload
		if (move_uploaded_file($lokasi_file,"$folder")){
			$konek = mysqli_connect("localhost","root","root","tb_rpl");
		  	$query = "INSERT INTO surat_masuk (jenis_id, tujuan_surat, asal_surat,tgl_surat,no_surat,perihal,file_surat,status)
		            VALUES('$jenis_surat', '$tujuan', '$asal', '$tgl', '$no', '$perihal', '$type', '0')";
		            
		  	mysqli_query($konek, $query);
		}

		redirect('c_admin/surat_baru','refresh');
	}

	function edit_surat_baru($id){
    	$data['editdata']	= $this->db->get_where('surat_baru',array('id_suma'=>$id))->result_object();
    	$data['page']	= "edit_surat_baru";
		$this->load->view('admin/admin_dash',$data);
    }

 	function update_surat_baru(){
 		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$no = $this->input->post('no');
		$tgl = $this->input->post('tgl');
		$asal = $this->input->post('asal');
		$tujuan = $this->input->post('tujuan');
		$perihal = $this->input->post('perihal');
		$object = array(
				'jenis_id' => $jenis,
				'no_surat' => $no,
				'tgl_surat' => $tgl,
				'asal_surat' => $asal,
				'tujuan_surat' => $tujuan,
				'perihal' => $perihal
			);
		$this->db->where('id_suma', $id);
		$this->db->update('surat_baru', $object); 
		redirect('c_admin/surat_baru','refresh');
 	}

	function hapus_surat_baru($id){
		$this->admin->hapus_surat_baru($id);
		redirect('c_admin/surat_baru','refresh');
	}


    /* Fungsi Surat Keluar */
    function arsip_surat_keluar(){
    	if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
			$data['data']	= $this->admin->tampil_surat_keluar()->result_object();
	    	$data['page'] = "arsip_surat_keluar";
	    	$this->load->view('admin/admin_dash',$data);
        }    	
    }

	function permohonan()
	{
		if (!$this->session->userdata('u_name')) {
        	$this->load->view('login');
        } 
        else {
			$data['data']	= $this->admin->tampil_permohonan()->result_object();
	    	$data['page'] = "permohonan";
	    	$this->load->view('admin/admin_dash',$data);
        }    
	}

	function template_surat()
	{
		$a= $this->uri->segment(3);
		$aa= $this->db->query("SELECT * FROM surat_keluar where id_suke=$a ")->result_array();
		$data['data'] = $this->admin->template_surat($a)->result_object();
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

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}




 //    function edit_surat_keluar($id){
 //    	$data['editdata']	= $this->db->get_where('tb_surat_keluar',array('surat_id'=>$id))->result_object();
 //    	$data['page']	= "edit_surat_keluar";
	// 	$this->load->view('admin/admin_dash',$data);
 //    }

	// function update_surat_keluar(){
	// 	$id = $this->input->post('id');
	// 	$jenis = $this->input->post('jenis');
	// 	$no = $this->input->post('no');
	// 	$tgl = $this->input->post('tgl');
	// 	$untuk = $this->input->post('untuk');
	// 	$perihal = $this->input->post('perihal');
	// 	$ket = $this->input->post('ket');
	// 	$object = array(
	// 			'jenis_id' => $jenis,
	// 			'no_surat' => $no,
	// 			'tgl_surat' => $tgl,
	// 			'untuk' => $untuk,
	// 			'perihal' => $perihal,
	// 			'ket' => $ket
	// 		);
	// 	$this->db->where('surat_id', $id);
	// 	$this->db->update('tb_surat_keluar', $object); 

	// 	redirect('c_admin/arsip_surat_keluar','refresh');
	// }

	// function hapus_surat_keluar($id){
	// 	$this->admin->hapus_surat_keluar($id);
	// 	redirect('c_admin/arsip_surat_keluar','refresh');
	// }

