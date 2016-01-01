<section class="content-header">
	<h1>
		Anggaran
		<small><?php echo $heading?></small>
	</h1>
	<ol class="breadcrumb"> <li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	    <li><?php echo anchor($breadcrumb,'Anggaran')?></li>
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
			<?php echo form_label('No Rekening','norek',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'norek','class'=>'form-control input-sm','maxlength'=>'60','size'=>'50','autocomplete'=>'off','autofocus'=>'autofocus','value'=>set_value('norek',(isset($row->norek)?$row->norek:'')),'required'=>'required'))?>
			<small><?php echo form_error('norek')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Tanggal','tanggal',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?format_dmy($row->tanggal):'')),'required'=>'required'))?>
			<small><?php echo form_error('tanggal')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Tipe','tipe',array('class'=>'control-label'))?>
			<?php echo form_dropdown('tipe',$this->anggaran_mdl->dropdown_tipe(),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'required=required class="form-control input-sm"')?>
			<small><?php echo form_error('tipe')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Jumlah','jumlah',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'jumlah','class'=>'form-control input-sm input-uang','maxlength'=>'15','autocomplete'=>'off','value'=>set_value('jumlah',(isset($row->jumlah)?$row->jumlah:'')),'required'=>'required'))?>
			<small><?php echo form_error('jumlah')?></small>
		</div>
	</div>
	<div class="box-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
		<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?php echo form_close()?>
</section>