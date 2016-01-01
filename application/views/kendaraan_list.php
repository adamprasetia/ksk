<section class="content-header">
	<h1>
		Kendaraan
		<small>List</small>
	</h1>
	<ol class="breadcrumb pull-right">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">Kendaraan</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
		<div class="box-header">
			<?php echo $add_btn?>
			<?php echo $delete_btn?>
		</div>
		<div class="box-body">
			<?php echo form_open($action,array('class'=>'form-inline'))?>
				<div class="form-group">
					<?php echo form_label('Show entries','limit')?>
					<?php echo form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
				</div>
				<div class="form-group">
					<?php echo form_input(array('name'=>'search','value'=>$this->input->get('search'),'autocomplete'=>'off','placeholder'=>'Search..','onchange=>"submit()"','class'=>'form-control input-sm'))?>
				</div>
				<div class="form-group">
					<?php echo form_dropdown('tipe',$this->kendaraan_mdl->dropdown_tipe(),$this->input->get('tipe'),'class="form-control input-sm" onchange="submit()"')?>
				</div>
				<div class="form-group">
					<?php echo form_dropdown('status',$this->kendaraan_mdl->dropdown_status(),$this->input->get('status'),'class="form-control input-sm" onchange="submit()"')?>
				</div>
			<?php echo form_close()?>
			<?php echo form_open($action_delete,array('class'=>'form-check-delete'))?>
			<div class="table-responsive">
				<?php echo $table?>
			</div>
			<?php echo form_close()?>
		</div>
		<div class="box-footer">
			<?php echo form_label($total,'',array('class'=>'label-footer'))?>
			<div class="pull-right">
				<?php echo $pagination?>
			</div>
		</div>		
	</div>
</section>