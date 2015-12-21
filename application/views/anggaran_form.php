<?=$this->session->flashdata('alert')?>
<?=form_open($action)?>
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="owner pull-right">
			<?=$owner?>
		</span>
		<ol class="breadcrumb">
			<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		  <li><?=anchor($breadcrumb,'Anggaran')?></li>
		  <li class="active"><?=$heading?></li>
		</ol>
		<div style="clear:both"></div>
	</div>
	<div class="panel-body">
		<div class="form-group form-inline">
			<?=form_label('No Rekening','norek',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'norek','class'=>'form-control input-sm','maxlength'=>'60','size'=>'50','autocomplete'=>'off','autofocus'=>'autofocus','value'=>set_value('norek',(isset($row->norek)?$row->norek:'')),'required'=>'required'))?>
			<small><?=form_error('norek')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Tanggal','tanggal',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?format_dmy($row->tanggal):'')),'required'=>'required'))?>
			<small><?=form_error('tanggal')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Tipe','tipe',array('class'=>'control-label'))?>
			<?=form_dropdown('tipe',$this->anggaran_mdl->dropdown_tipe(),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'required=required class="form-control input-sm"')?>
			<small><?=form_error('tipe')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Jumlah','jumlah',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'jumlah','class'=>'form-control input-sm input-uang','maxlength'=>'15','autocomplete'=>'off','value'=>set_value('jumlah',(isset($row->jumlah)?$row->jumlah:'')),'required'=>'required'))?>
			<small><?=form_error('jumlah')?></small>
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
		<?=anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?=form_close()?>

