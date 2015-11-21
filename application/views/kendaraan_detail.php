<ol class="breadcrumb">
	<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
  <li><?=anchor($breadcrumb,'Kendaraan')?></li>
  <li class="active">Detail</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		Kendaraan Detail	
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
		<div class="form-group form-inline">
			<?=form_label('Status Kendaraan','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=''?>
		</div>
		<small>*) Note : Ganti olie sebulan sekali disebut mobil sehat 100%, Di ganti dibawah 9kalidalam setaun kurang sehat 50% WARNING</small>
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