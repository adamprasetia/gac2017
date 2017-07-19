<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
	}
	public function index(){
		$data['content'] = $this->load->view('import','',true);
		$this->load->view('template',$data);
	}
	public function execute(){		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx';
		$config['file_name'] = 'import_'.$this->user_login['id'].'.xlsx';
		$config['overwrite'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()){
			$this->session->set_flashdata('alert','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
		}else{
			$this->load->model('import_model');
			require_once "../assets/phpexcel/PHPExcel.php";
			$excel = new PHPExcel();
			$excel = PHPExcel_IOFactory::load(FCPATH."/uploads/import_".$this->user_login['id'].".xlsx");
			$excel->setActiveSheetIndex(0);
			$active_sheet = $excel->getActiveSheet();
			if($active_sheet->getCell('A1')->getValue()=='No'){
				$i=3;
				while(trim($active_sheet->getCell('A'.$i)->getValue())<>''){
					$data[] = array(
						'mop_id'=>trim($active_sheet->getCell('B'.$i)->getValue()),
						'username'=>trim($active_sheet->getCell('C'.$i)->getValue()),
						'fullname'=>trim($active_sheet->getCell('D'.$i)->getValue()),
						'nickname'=>trim($active_sheet->getCell('E'.$i)->getValue()),
						'dob'=>trim($active_sheet->getCell('H'.$i)->getValue()).'-'.trim($active_sheet->getCell('G'.$i)->getValue()).'-'.trim($active_sheet->getCell('F'.$i)->getValue()),
						'city'=>trim($active_sheet->getCell('I'.$i)->getValue()),
						'tlp'=>trim($active_sheet->getCell('J'.$i)->getValue()),
						'email'=>trim($active_sheet->getCell('K'.$i)->getValue()),
						'tw'=>trim($active_sheet->getCell('L'.$i)->getValue()),
						'art_title'=>trim($active_sheet->getCell('M'.$i)->getValue()),
						'art_type'=>trim($active_sheet->getCell('N'.$i)->getValue()),
						'date_create'=>date('Y-m-d H:i:s'),
						'user_create'=>$this->user_login['id'],
					);
					$i++;
				}
				$this->import_model->import($data);
				$this->session->set_flashdata('alert','<div class="alert alert-success">Import : <b>'.($i-3).'</b> Data Completed!!!</div>');
			}else{
				$this->session->set_flashdata('alert','<div class="alert alert-danger">Warning : Excel Value Failed!!!</div>');					
			}
		}
		redirect('import');			
	}
}
