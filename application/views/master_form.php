<?=$this->session->flashdata('alert')?>
<?=form_open($action)?>
<div class="panel panel-default">
	<div class="panel-heading">
		<span class="owner pull-right">
			<?=$owner?>
		</span>
		<ol class="breadcrumb">
			<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		  <li><?=anchor($breadcrumb,'List Data')?></li>
		  <li class="active"><?=$heading?></li>
		</ol>
		<div style="clear:both"></div>
	</div>
	<div class="panel-body">
		<div class="form-group form-inline">
			<?=form_label('Kode','kode',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'kode','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('kode',(isset($row->kode)?$row->kode:'')),'required'=>'required','autofocus'=>'autofocus'))?>
			<small><?=form_error('kode')?></small>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Nama','nama',array('class'=>'control-label'))?>
			<?=form_input(array('name'=>'nama','class'=>'form-control input-sm','maxlength'=>'50','size'=>'50','autocomplete'=>'off','value'=>set_value('nama',(isset($row->nama)?$row->nama:'')),'required'=>'required'))?>
			<small><?=form_error('nama')?></small>
		</div>
	</div>
	<div class="panel-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
		<?=anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?=form_close()?>

