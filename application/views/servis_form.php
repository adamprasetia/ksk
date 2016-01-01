<section class="content-header">
	<h1>
		Servis
		<small><?php echo $heading?></small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	    <li><?php echo anchor($breadcrumb,'Servis')?></li>
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
		<div class="row">
			<div class="col-md-6">
				<div class="form-group form-inline">
					<?php echo form_label('Nomor','nomor',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','autofocus'=>'autofocus','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:'')),'required'=>'required'))?>
					<small><?php echo form_error('nomor')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tanggal','tanggal',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?format_dmy($row->tanggal):'')),'required'=>'required'))?>
					<small><?php echo form_error('tanggal')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tipe','tipe',array('class'=>'control-label'))?>
					<?php echo form_dropdown('tipe',$this->servis_mdl->dropdown_tipe(),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'required=required class="form-control input-sm"')?>
					<small><?php echo form_error('tipe')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Kilometer','kilometer',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'kilometer','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('kilometer',(isset($row->kilometer)?$row->kilometer:'')),'required'=>'required'))?>
					<small><?php echo form_error('kilometer')?></small>
				</div>
			</div>	
			<div class="col-md-6">	
				<div class="form-group form-inline">
					<?php echo form_label('Kendaraan','kendaraan',array('class'=>'control-label'))?>
					<?php echo form_dropdown('kendaraan',$this->kendaraan_mdl->dropdown(),set_value('kendaraan',(isset($row->kendaraan)?$row->kendaraan:'')),'required=required class="form-control input-sm" id="kendaraan"')?>
					<small><?php echo form_error('kendaraan')?></small>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Tipe Kendaraan','tipe_kendaraan',array('class'=>'control-label'))?>
					<?php echo form_dropdown('tipe_kendaraan',$this->kendaraan_mdl->dropdown_tipe(),set_value('tipe_kendaraan',''),'class="form-control input-sm" id="tipe_kendaraan" disabled')?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Nomor Mesin','nomes',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nomes','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','disabled'=>'disabled','id'=>'nomes','value'=>set_value('nomes','')))?>
				</div>
				<div class="form-group form-inline">
					<?php echo form_label('Nomor Chassis','nocha',array('class'=>'control-label'))?>
					<?php echo form_input(array('name'=>'nocha','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','disabled'=>'disabled','id'=>'nocha','value'=>set_value('nocha','')))?>
				</div>
			</div>
		</div>
		<div class="table">
			<a id="tambah-servis" href="javascript:void(0)" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
			<?php echo $table?>
		</div>	
	</div>
	<div class="box-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
		<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?php echo form_close()?>
</section>