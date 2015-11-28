<?=$this->session->flashdata('alert')?>
<?=form_open($action)?>
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="owner pull-right">
			<?=$owner?>
		</span>
		<ol class="breadcrumb">
			<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		  <li><?=anchor($breadcrumb,'Kendaraan')?></li>
		  <li class="active"><?=$heading?></li>
		</ol>
		<div style="clear:both"></div>
	</div>
	<div class="panel-body">
		<div class="form-group form-inline">
			<?=form_label('Kode Kendaraan','kode',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'kode','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('kode',(isset($row->kode)?$row->kode:'')),'required'=>'required','autofocus'=>'autofocus'))?>
			<small><?=form_error('kode')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Nomor Polisi','nopol',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'nopol','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('nopol',(isset($row->nopol)?$row->nopol:'')),'required'=>'required'))?>
			<small><?=form_error('nopol')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Tipe Kendaraan','tipe',array('class'=>'control-label'))?>
			<?=form_dropdown('tipe',$this->kendaraan_mdl->dropdown_tipe(),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'required=required class="form-control input-sm"')?>
			<small><?=form_error('tipe')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Nomor Mesin','nomes',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'nomes','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('nomes',(isset($row->nomes)?$row->nomes:'')),'required'=>'required'))?>
			<small><?=form_error('nomes')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Nomor Chassis','nocha',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'nocha','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('nocha',(isset($row->nocha)?$row->nocha:'')),'required'=>'required'))?>
			<small><?=form_error('nocha')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Status','status',array('class'=>'control-label'))?>
			<?=form_dropdown('status',$this->kendaraan_mdl->dropdown_status(),set_value('status',(isset($row->status)?$row->status:'')),'required=required class="form-control input-sm"')?>
			<small><?=form_error('status')?></small>
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
		<?=anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?=form_close()?>

