<section class="content-header">
	<h1>
		User
		<small><?php echo $heading?></small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	  <li><?php echo anchor($breadcrumb,'Security')?></li>
	  <li class="active"><?php echo $heading?></li>
	</ol>
</section>
<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open($action)?>
	<div class="box box-default">
		<div class="box-header">
			<?php echo $owner?>
		</div>
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label('Fullname','fullname',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'fullname','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('fullname',(isset($row->fullname)?$row->fullname:'')),'required'=>'required','autofocus'=>'autofocus'))?>
				<small><?php echo form_error('fullname')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Username','username',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'username','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('username',(isset($row->username)?$row->username:'')),'required'=>'required'))?>
				<small><?php echo form_error('username')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Password','password',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'password','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('password',(isset($row->password)?$row->password:'')),'required'=>'required'))?>
				<small><?php echo form_error('password')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Level','level',array('class'=>'control-label'))?>
				<?php echo form_dropdown('level',$this->user_mdl->dropdown_level(),set_value('level',(isset($row->level)?$row->level:'')),'required=required class="form-control input-sm"')?>
				<small><?php echo form_error('level')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Status','status',array('class'=>'control-label'))?>
				<?php echo form_dropdown('status',$this->user_mdl->dropdown_status(),set_value('status',(isset($row->status)?$row->status:'')),'required=required class="form-control input-sm"')?>
				<small><?php echo form_error('status')?></small>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
			<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
		</div>
	</div>
	<?php echo form_close()?>
</section>
