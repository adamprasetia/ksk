<section class="content-header">
	<h1>
		Servis Komponen
		<small>Rekap</small>
	</h1>
	<ol class="breadcrumb pull-right">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">Rekap Servis Komponen</li>
	</ol>
</section>
<section class="content">
<?php echo form_open('servis_komponen_rekap',array('method'=>'get','class'=>'form-inline'))?>
<div class="box box-default">
	<div class="box-header">
		<?php echo $pdf_btn?>
	</div>	
	<div class="box-body">
		<div class="form-group">
			<?php echo form_label('Show entries','limit')?>
			<?php echo form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
		</div>
		<div class="form-group">
			<?php echo form_dropdown('kendaraan',$this->kendaraan_mdl->dropdown(),set_value('kendaraan',$this->input->get('kendaraan')),'onchange="submit()" class="form-control input-sm" id="kendaraan"')?>
		</div>
		<div class="form-group">
			<?php echo form_input(array('name'=>'date_from','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('date_from',$this->input->get('date_from'))))?>
			&nbsp;s/d&nbsp;<?php echo form_input(array('name'=>'date_to','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('date_to',$this->input->get('date_to'))))?>
		</div>
		<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
		<div class="table-responsive">
			<?php echo $table?>
		</div>
	</div>	
	<div class="box-footer">
		<?php echo form_label($total,'',array('class'=>'label-footer'))?>
		<div class="pull-right">
			<?php echo $pagination?>
		</div>
	</div>		
</div>	
<?php echo form_close()?>
</section>