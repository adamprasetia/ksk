<?=$this->session->flashdata('alert')?>
<?=form_open($action)?>
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="owner pull-right">
			<?=$owner?>
		</span>
		<ol class="breadcrumb">
			<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		  <li><?=anchor($breadcrumb,'Servis')?></li>
		  <li class="active"><?=$heading?></li>
		</ol>
		<div style="clear:both"></div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group form-inline">
					<?=form_label('Nomor','nomor',array('class'=>'control-label'))?>
					<?=form_input(array('name'=>'nomor','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','autofocus'=>'autofocus','value'=>set_value('nomor',(isset($row->nomor)?$row->nomor:'')),'required'=>'required'))?>
					<small><?=form_error('nomor')?></small>
				</div>
				<div class="form-group form-inline">
					<?=form_label('Tanggal','tanggal',array('class'=>'control-label'))?>
					<?=form_input(array('name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?format_dmy($row->tanggal):'')),'required'=>'required'))?>
					<small><?=form_error('tanggal')?></small>
				</div>
				<div class="form-group form-inline">
					<?=form_label('Tipe','tipe',array('class'=>'control-label'))?>
					<?=form_dropdown('tipe',$this->servis_mdl->servis_tipe_dropdown(),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'required=required class="form-control input-sm"')?>
					<small><?=form_error('tipe')?></small>
				</div>
				<div class="form-group form-inline">
					<?=form_label('Kilometer','kilometer',array('class'=>'control-label'))?>
					<?=form_input(array('name'=>'kilometer','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('kilometer',(isset($row->kilometer)?$row->kilometer:'')),'required'=>'required'))?>
					<small><?=form_error('kilometer')?></small>
				</div>
			</div>	
			<div class="col-md-6">	
				<div class="form-group form-inline">
					<?=form_label('Kendaraan','kendaraan',array('class'=>'control-label'))?>
					<?=form_dropdown('kendaraan',$this->kendaraan_mdl->kendaraan_dropdown(),set_value('kendaraan',(isset($row->kendaraan)?$row->kendaraan:'')),'required=required class="form-control input-sm" id="kendaraan"')?>
					<small><?=form_error('kendaraan')?></small>
				</div>
				<div class="form-group form-inline">
					<?=form_label('Tipe Kendaraan','tipe_kendaraan',array('class'=>'control-label'))?>
					<?=form_dropdown('tipe_kendaraan',$this->kendaraan_mdl->kendaraan_tipe_dropdown(),set_value('tipe_kendaraan',''),'class="form-control input-sm" id="tipe_kendaraan" readonly')?>
				</div>
				<div class="form-group form-inline">
					<?=form_label('Nomor Mesin','nomes',array('class'=>'control-label'))?>
					<?=form_input(array('name'=>'nomes','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','readonly'=>'readonly','id'=>'nomes','value'=>set_value('nomes','')))?>
				</div>
				<div class="form-group form-inline">
					<?=form_label('Nomor Chassis','nocha',array('class'=>'control-label'))?>
					<?=form_input(array('name'=>'nocha','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','readonly'=>'readonly','id'=>'nocha','value'=>set_value('nocha','')))?>
				</div>
			</div>
		</div>
		<div class="table">
			<a id="tambah-servis" href="javascript:void(0)" class="btn btn-warning btn-xs">Tambah</a>
			<?=$table?>
		</div>	
	</div>
	<div class="panel-footer">
		<button class="btn btn-warning btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
	</div>
</div>
<?=form_close()?>

