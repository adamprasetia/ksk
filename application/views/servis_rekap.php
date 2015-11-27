<?=form_open('servis_rekap',array('method'=>'get','class'=>'form-inline'))?>
<div class="panel panel-default">
	<div class="panel-heading">
		<?=$pdf_btn?>
		<ol class="breadcrumb pull-right">
			<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
			<li class="active">Kendaraan</li>
		</ol>
	</div>	
	<div class="panel-body">
		<div class="form-group">
			<?=form_label('Show entries','limit')?>
			<?=form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
		</div>
		<div class="form-group">
			<?=form_dropdown('kendaraan',$this->kendaraan_mdl->dropdown(),set_value('kendaraan',$this->input->get('kendaraan')),'onchange="submit()" class="form-control input-sm" id="kendaraan"')?>
		</div>
		<div class="form-group">
			<?=form_input(array('name'=>'date_from','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('date_from',$this->input->get('date_from'))))?>
			&nbsp;s/d&nbsp;<?=form_input(array('name'=>'date_to','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('date_to',$this->input->get('date_to'))))?>
		</div>
		<button class="btn btn-warning btn-sm" type="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
		<div class="table-responsive">
			<?=$table?>
		</div>
	</div>	
	<div class="panel-footer">
		<?=form_label($total,'',array('class'=>'label-footer'))?>
		<div class="pull-right">
			<?=$pagination?>
		</div>
	</div>		
</div>	
<?=form_close()?>
