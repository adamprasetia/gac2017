<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();		
	}
	public function index()
	{
		$ref = file_get_contents('./files/ref.json');
		$xdata['row'] = json_decode($ref, true);
		$data['content'] = $this->load->view('ref',$xdata,true);
		$this->load->view('template',$data);
	}
	public function update()
	{
		$data = array(
			'f2f'=>$this->input->post('f2f'),
			'grandprize'=>$this->input->post('grandprize'),
			'grandprize_date'=>$this->input->post('grandprize_date'),
			'sesi_tanya_jawab'=>$this->input->post('sesi_tanya_jawab')
		);
		$json = json_encode($data);
		file_put_contents('./files/ref.json', $json);
		$this->session->set_flashdata('alert','<div class="alert alert-success">Complete...!!!</div>');
		redirect('ref');		
	}
}