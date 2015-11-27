<?=$this->session->flashdata('alert')?>
<?=form_open($action)?>
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="owner pull-right">
			<?=$owner?>
		</span>
		<ol class="breadcrumb">
			<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		  <li><?=anchor($breadcrumb,'Security')?></li>
		  <li class="active"><?=$heading?></li>
		</ol>
		<div style="clear:both"></div>
	</div>
	<div class="panel-body">
		<div class="form-group form-inline">
			<?=form_label('Fullname','fullname',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'fullname','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('fullname',(isset($row->fullname)?$row->fullname:'')),'required'=>'required','autofocus'=>'autofocus'))?>
			<small><?=form_error('fullname')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Username','username',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'username','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('username',(isset($row->username)?$row->username:'')),'required'=>'required'))?>
			<small><?=form_error('username')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Password','password',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'password','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('password',(isset($row->password)?$row->password:'')),'required'=>'required'))?>
			<small><?=form_error('password')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Level','level',array('class'=>'control-label'))?>
			<?=form_dropdown('level',$this->user_mdl->dropdown_level(),set_value('level',(isset($row->level)?$row->level:'')),'required=required class="form-control input-sm"')?>
			<small><?=form_error('level')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Status','status',array('class'=>'control-label'))?>
			<?=form_dropdown('status',$this->user_mdl->dropdown_status(),set_value('status',(isset($row->status)?$row->status:'')),'required=required class="form-control input-sm"')?>
			<small><?=form_error('status')?></small>
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-warning btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
	</div>
</div>
<?=form_close()?>

