<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcoba extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function ambildata()
	{
		$data = array(
			'judul' =>'Model' ,
			'head' =>'Model' ,
			'isi' =>'isi model' , 
			);
		return $data;
	}

}
