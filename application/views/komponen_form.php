<?=$this->session->flashdata('alert')?>
<?=form_open($action)?>
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="owner pull-right">
			<?=$owner?>
		</span>
		<ol class="breadcrumb">
			<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		  <li><?=anchor($breadcrumb,'Komponen')?></li>
		  <li class="active"><?=$heading?></li>
		</ol>
		<div style="clear:both"></div>
	</div>
	<div class="panel-body">
		<div class="form-group form-inline">
			<?=form_label('Nama','nama',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'nama','class'=>'form-control input-sm','maxlength'=>'60','size'=>'50','autocomplete'=>'off','autofocus'=>'autofocus','value'=>set_value('nama',(isset($row->nama)?$row->nama:'')),'required'=>'required'))?>
			<small><?=form_error('nama')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Group','group',array('class'=>'control-label'))?>
			<?=form_dropdown('group',$this->komponen_mdl->komponen_group_dropdown(),set_value('group',(isset($row->group)?$row->group:'')),'required=required class="form-control input-sm"')?>
			<small><?=form_error('group')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Satuan','satuan',array('class'=>'control-label'))?>
			<?=form_dropdown('satuan',$this->komponen_mdl->komponen_satuan_dropdown(),set_value('satuan',(isset($row->satuan)?$row->satuan:'')),'required=required class="form-control input-sm"')?>
			<small><?=form_error('satuan')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Harga','harga',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'harga','class'=>'form-control input-sm input-uang','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('harga',(isset($row->harga)?$row->harga:'')),'required'=>'required'))?>
			<small><?=form_error('harga')?></small>
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-warning btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
	</div>
</div>
<?=form_close()?>

