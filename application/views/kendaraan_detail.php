<ol class="breadcrumb">
	<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
  <li><?=anchor($breadcrumb,'Kendaraan')?></li>
  <li class="active">Detail</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		Detail	
	</div>	
	<div class="panel-body">
		<div class="form-group form-inline">
			<?=form_label('Nomor Polisi','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=$kendaraan->nopol?>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Tipe','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=$kendaraan->tipe_nama?>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Nomor Mesin','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=$kendaraan->nomes?>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Nomor Chassis','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=$kendaraan->nocha?>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		Status
	</div>	
	<div class="panel-body">
		<div class="form-group form-inline">
			<?=form_label('Oli Mesin','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=olie_mesin_status(timeago(strtotime($this->reminder_mdl->oli_mesin($kendaraan->id)->row()->tanggal)))?>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Tunup','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=''?>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		Service History	
	</div>	
	<div class="panel-body">
		<?=$servis_history?>	
	</div>
</div>