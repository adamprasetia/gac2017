<section class="content-header">
	<h1>
		Reference
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">Reference</li>
	</ol>
</section>
<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open('ref/update')?>
	<div class="box box-default">
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label('Tanggal F2F','f2f',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'f2f','class'=>'form-control input-sm','size'=>'50','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('f2f',(isset($row['f2f'])?$row['f2f']:'')),'required'=>'required','autofocus'=>'autofocus'))?>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Grandprize','grandprize',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'grandprize','class'=>'form-control input-sm','size'=>'50','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('grandprize',(isset($row['grandprize'])?$row['grandprize']:'')),'required'=>'required'))?>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Tanggal Grandprize','grandprize_date',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'grandprize_date','class'=>'form-control input-sm','size'=>'50','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('grandprize_date',(isset($row['grandprize_date'])?$row['grandprize_date']:'')),'required'=>'required'))?>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Sesi Tanya Jawab','sesi_tanya_jawab',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'sesi_tanya_jawab','class'=>'form-control input-sm','size'=>'50','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('sesi_tanya_jawab',(isset($row['sesi_tanya_jawab'])?$row['sesi_tanya_jawab']:'')),'required'=>'required'))?>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Update</button>
		</div>
	</div>
	<?php echo form_close()?>
</section>
