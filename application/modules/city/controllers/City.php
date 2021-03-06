<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('city_model');
	}
	public function index()
	{
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->city_model->count_all();

		$xdata['action'] 			= 'city/search'.get_query_string();
		$xdata['action_delete'] 	= 'city/delete'.get_query_string();
		$xdata['add_btn'] 			= anchor('city/add','<span class="glyphicon glyphicon-plus"></span> Tambah',array('class'=>'btn btn-success btn-sm'));
		$xdata['delete_btn'] 		= '<button id="delete-btn" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete Checked</button>';

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'city' => 'City',
			'address' => 'Address',
			'time' => 'Time'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('city'.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->city_model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				anchor('city/edit/'.$r->id.get_query_string(),$r->city),
				$r->address,
				$r->time,
				anchor('city/edit/'.$r->id.get_query_string(),'Edit')
				."&nbsp;|&nbsp;".anchor('city/delete/'.$r->id.get_query_string(),'Delete',array('onclick'=>"return confirm('you sure')"))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = "city".get_query_string(null,'offset');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('city_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit')
		);
		redirect('city'.get_query_string($data));		
	}
	private function _field(){
		$data = array(
			'city' => $this->input->post('city'),
			'address' => $this->input->post('address'),
			'time' => $this->input->post('time')
		);
		return $data;		
	}
	private function _set_rules(){
		$this->form_validation->set_rules('city','City','required|trim');
		$this->form_validation->set_rules('address','Address','required|trim');
		$this->form_validation->set_rules('time','Time','required|trim');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
	}
	public function add(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['action'] = 'city/add'.get_query_string();
			$xdata['breadcrumb'] = 'city'.get_query_string();
			$xdata['heading'] = 'New';
			$xdata['owner'] = '';
			$data['content'] = $this->load->view('city_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->user_login['id'];
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->city_model->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been saved</div>');
			redirect('city/add'.get_query_string());
		}
	}
	public function edit($id){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['row'] = $this->city_model->get_from_field('id',$id)->row();
			$xdata['action'] = 'city/edit/'.$id.get_query_string();
			$xdata['breadcrumb'] = 'city'.get_query_string();
			$xdata['heading'] = 'Update';
			$xdata['owner'] = owner($xdata['row']);
			$data['content'] = $this->load->view('city_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->user_login['id'];
			$data['date_update'] = date('Y-m-d H:i:s');
			if($data['password'] == '')
				unset($data['password']);
			else
				$data['password'] = md5($data['password']);
			$this->city_model->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been edited</div>');
			redirect('city/edit/'.$id.get_query_string());
		}
	}
	public function delete($id=''){
		if($id<>''){
			$this->city_model->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->city_model->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been deleted</div>');
		redirect('city'.get_query_string());
	}
}