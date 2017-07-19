<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interview extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('interview_model');
		$this->load->model('callhis_model');
	}
	public function index(){
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->interview_model->count_all();

		$xdata['action'] = 'interview/search'.get_query_string();

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'fullname'		=> 'Fullname',
			'dob'			=> 'Day of Birth',
			'tlp'			=> 'Telephone',
			'email'			=> 'Email',
			'status_name'	=> 'Status',
			'interviewer'	=> 'Interviewer',
			'art_type'		=> 'Art Type',
			'note'			=> 'Note'
		);
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('interview'.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->interview_model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$count_call = $this->interview_model->count_call($r->id);
			$this->table->add_row(
				$i++,
				anchor('interview/phone/'.$r->id.get_query_string(),$r->fullname).($r->valid==1?' <span class="label label-success">Valid</span>':'').($r->audit==1?' <span class="label label-primary">Audit</span>':''),
				$r->dob,
				$r->tlp,
				$r->email,			
				$r->status_name,
				$r->interviewer,			
				$r->art_type,			
				$this->callhis_model->get_note($r->id),
				anchor('interview/phone/'.$r->id.get_query_string(),'Phone'.($count_call > 0?' <span class="label label-success">'.$count_call.' <span class="glyphicon glyphicon-earphone"></span></span>':''))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = "interview".get_query_string(null,'offset');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('interview_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'status'=>$this->input->post('status'),
			'interviewer'=>$this->input->post('interviewer'),
			'art_type'=>$this->input->post('art_type'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to'),
			'valid'=>$this->input->post('valid'),
			'audit'=>$this->input->post('audit'),
			'proses'=>$this->input->post('proses')
		);
		redirect('interview'.get_query_string($data));		
	}	
	public function phone($id){
		$this->form_validation->set_rules('status','Status','trim');
		if($this->form_validation->run()===false){
			$xdata['candidate'] 	= $this->interview_model->get_candidate($id);
			$xdata['breadcrumb']	= 'interview'.get_query_string();
			$xdata['callhis']		= $this->interview_model->get_call($id);
			$xdata['action']		= 'interview/phone/'.$id.get_query_string();
			$data['content'] = $this->load->view('interview_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = array(
				'status'=>$this->input->post('status'),
				'audit'=>($this->input->post('audit')?$this->input->post('audit'):'0'),
				'valid'=>($this->input->post('valid')?$this->input->post('valid'):'0'),
				'called'=>($this->input->post('called')?$this->input->post('called'):'0'),
				'minute'=>($this->input->post('minute')?$this->input->post('minute'):'0'),
				'smoker'=>($this->input->post('smoker')?$this->input->post('smoker'):'0'),
				'callagain'=>($this->input->post('callagain')?$this->input->post('callagain'):'0'),
				'fullname'=>$this->input->post('fullname'),
				'nickname'=>$this->input->post('nickname'),
				'dob'=>$this->input->post('dob_yy').'-'.$this->input->post('dob_mm').'-'.$this->input->post('dob_dd'),
				'city'=>$this->input->post('city'),
				'tlp'=>$this->input->post('tlp'),
				'email'=>$this->input->post('email'),
				'tw'=>$this->input->post('tw'),
				'brand'=>$this->input->post('brand'),
				'plagiat'=>($this->input->post('plagiat')?$this->input->post('plagiat'):'0'),
				'plagiat_desc'=>$this->input->post('plagiat_desc'),
				'art_desc'=>$this->input->post('art_desc'),
				'signature'=>($this->input->post('signature')?$this->input->post('signature'):'0'),
				'facetoface'=>($this->input->post('facetoface')?$this->input->post('facetoface'):'0'),
				'city_f2f'=>($this->input->post('city_f2f')?$this->input->post('city_f2f'):'0'),
				'overseas'=>($this->input->post('overseas')?$this->input->post('overseas'):'0'),
				'overseas_desc'=>$this->input->post('overseas_desc'),
				'visa'=>($this->input->post('visa')?$this->input->post('visa'):'0'),
				'visa_desc'=>$this->input->post('visa_desc'),
				'grandprize'=>($this->input->post('grandprize')?$this->input->post('grandprize'):'0'),
				'trivia'=>$this->input->post('trivia'),
				'experience'=>$this->input->post('experience'),
				'english1'=>$this->input->post('english1'),
				'english2'=>$this->input->post('english2'),
				'english3'=>($this->input->post('english3')?$this->input->post('english3'):'0'),
				'english3_desc'=>$this->input->post('english3_desc'),
				'english4'=>$this->input->post('english4'),
				'passport'=>($this->input->post('passport')?$this->input->post('passport'):'0'),
				'passport_name'=>$this->input->post('passport_name'),
				'passport_exp'=>($this->input->post('passport_exp_yy')?$this->input->post('passport_exp_yy'):'0000').'-'.($this->input->post('passport_exp_mm')?$this->input->post('passport_exp_mm'):'00').'-'.($this->input->post('passport_exp_dd')?$this->input->post('passport_exp_dd'):'00'),
				'country'=>$this->input->post('country'),
				'campaign'=>($this->input->post('campaign')?$this->input->post('campaign'):'0'),
				'campaign_desc'=>$this->input->post('campaign_desc'),
			);
			$this->interview_model->phone($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been saved</div>');
			redirect('interview/phone/'.$id.get_query_string());			
		}
	}
	public function get_city()
	{
		$id = $this->input->post('id');
		$row = $this->interview_model->get_city_by_id($id);
		if ($row) {
			echo $row->address.'<br>'.$row->time;
		}
	}
}