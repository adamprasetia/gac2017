<section class="content-header">
	<h1>
		City
		<small><?php echo $heading?></small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	  <li><?php echo anchor($breadcrumb,'List')?></li>
	  <li class="active"><?php echo $heading?></li>
	</ol>
</section>
<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open_multipart($action)?>
	<div class="box box-default">
		<div class="box-header owner">
			<?php echo $owner?>
		</div>
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label('City','city',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'city','class'=>'form-control input-sm','size'=>'50','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('city',(isset($row->city)?$row->city:'')),'required'=>'required','autofocus'=>'autofocus'))?>
				<small><?php echo form_error('city')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Address','address',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'address','class'=>'form-control input-sm','size'=>'70','maxlength'=>'200','autocomplete'=>'off','value'=>set_value('address',(isset($row->address)?$row->address:'')),'required'=>'required'))?>
				<small><?php echo form_error('address')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Time','time',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'time','class'=>'form-control input-sm','size'=>'40','maxlength'=>'100','autocomplete'=>'off','value'=>set_value('time',(isset($row->time)?$row->time:'')),'required'=>'required'))?>
				<small><?php echo form_error('time')?></small>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
			<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Back',array('class'=>'btn btn-danger btn-sm'))?>
		</div>
	</div>
	<?php echo form_close()?>
</section>
