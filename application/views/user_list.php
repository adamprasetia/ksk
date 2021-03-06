<section class="content-header">
	<h1>
		User
		<small>List</small>
	</h1>
	<ol class="breadcrumb pull-right">
		<li><?=anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
		<li class="active">Security</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
		<div class="box-header">
			<?=$add_btn?>
			<?=$delete_btn?>
		</div>
		<div class="box-body">
			<?=form_open($action,array('class'=>'form-inline'))?>
				<div class="form-group">
					<?=form_label('Show entries','limit')?>
					<?=form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
				</div>
				<div class="form-group">
					<?=form_input(array('name'=>'search','value'=>$this->input->get('search'),'autocomplete'=>'off','placeholder'=>'Search..','onchange=>"submit()"','class'=>'form-control input-sm'))?>
				</div>
				<div class="form-group">
					<?=form_dropdown('level',$this->user_mdl->dropdown_level(),$this->input->get('level'),'class="form-control input-sm" onchange="submit()"')?>
				</div>
				<div class="form-group">
					<?=form_dropdown('status',$this->user_mdl->dropdown_status(),$this->input->get('status'),'class="form-control input-sm" onchange="submit()"')?>
				</div>
			<?=form_close()?>
			<?=form_open($action_delete,array('class'=>'form-check-delete'))?>
			<div class="table-responsive">
				<table class="table">
					<?=$table?>
				</table>
			</div>
			<?=form_close()?>
		</div>
		<div class="box-footer">
			<?=form_label($total,'',array('class'=>'label-footer'))?>
			<div class="pull-right">
				<?=$pagination?>
			</div>
		</div>		
	</div>
</section>