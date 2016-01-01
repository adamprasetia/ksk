<section class="content-header">
	<h1>
		Komponen
		<small><?php echo $heading?></small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	    <li><?php echo anchor($breadcrumb,'Komponen')?></li>
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
			<?php echo form_label('Kode','kode',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'kode','class'=>'form-control input-sm','maxlength'=>'60','size'=>'50','autocomplete'=>'off','autofocus'=>'autofocus','value'=>set_value('kode',(isset($row->kode)?$row->kode:'')),'required'=>'required'))?>
			<small><?php echo form_error('kode')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Nama','nama',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'nama','class'=>'form-control input-sm','maxlength'=>'60','size'=>'50','autocomplete'=>'off','value'=>set_value('nama',(isset($row->nama)?$row->nama:'')),'required'=>'required'))?>
			<small><?php echo form_error('nama')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Group','group',array('class'=>'control-label'))?>
			<?php echo form_dropdown('group',$this->komponen_mdl->dropdown_group(),set_value('group',(isset($row->group)?$row->group:'')),'required=required class="form-control input-sm"')?>
			<small><?php echo form_error('group')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Satuan','satuan',array('class'=>'control-label'))?>
			<?php echo form_dropdown('satuan',$this->komponen_mdl->dropdown_satuan(),set_value('satuan',(isset($row->satuan)?$row->satuan:'')),'required=required class="form-control input-sm"')?>
			<small><?php echo form_error('satuan')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Harga','harga',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'harga','class'=>'form-control input-sm input-uang','maxlength'=>'10','autocomplete'=>'off','value'=>set_value('harga',(isset($row->harga)?$row->harga:'')),'required'=>'required'))?>
			<small><?php echo form_error('harga')?></small>
		</div>
	</div>
	<div class="box-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
		<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?php echo form_close()?>
</section>