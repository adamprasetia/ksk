<?=$this->session->flashdata('alert')?>
<?=form_open('home/change_password')?>
<div class="panel panel-default">
	<div class="panel-heading">
		<ol class="breadcrumb">
			<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		  <li class="active">Change Password</li>
		</ol>
		<div style="clear:both"></div>
	</div>
	<div class="panel-body">
		<div class="form-group form-inline">
			<?=form_label('Old Password','old_pass',array('class'=>'control-label'))?>
			<?=form_password(array('name'=>'old_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required','autofocus'=>'autofocus'))?>
			<small><?=form_error('old_pass')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('New Password','new_pass',array('class'=>'control-label'))?>
			<?=form_password(array('name'=>'new_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required'))?>
			<small><?=form_error('new_pass')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Confirm Password','con_pass',array('class'=>'control-label'))?>
			<?=form_password(array('name'=>'con_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required'))?>
			<small><?=form_error('con_pass')?></small>
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-edit"></span> Change</button>
		<?=anchor('home','<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?=form_close()?>

