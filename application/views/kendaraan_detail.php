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
			<?=form_label('Kode Kendaraan','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=$kendaraan->kode?>
		</div>
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
			:&nbsp;&nbsp;<?=olie_mesin_status($this->reminder_mdl->terakhir_ganti_oli($kendaraan->kode))?>
		</div>
		<div class="form-group form-inline">
			<?=form_label('Tunup','',array('class'=>'control-label'))?>
			:&nbsp;&nbsp;<?=tunup_status($this->reminder_mdl->terakhir_tunup($kendaraan->kode))?>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		Service History	
	</div>	
	<div class="panel-body">
		<?=$servis_history?>	
		<button class="btn btn-default btn-block" onclick="load_more(this)" data-kendaraan-kode="<?=$kendaraan->kode?>" data-offset="10" data-href="<?=base_url('index.php/kendaraan/servis_history_more')?>">Load More</button>
	</div>
</div>
<script>
	$(document).ready(function(){

	});
	function load_more(e){
    $(e).hide();
    $.ajax({
        url: $(e).attr("data-href"),
        type: "POST",
        datatype: "json",
        data: {
            kendaraan_kode: $(e).attr("data-kendaraan-kode"),
            offset: $(e).attr("data-offset")
        },
        success: function(t) {
          jsondata = $.parseJSON(t);
          if (jsondata.status == true) {
              $("#tbl-servis").append(jsondata.result);
              $(e).attr("data-offset", jsondata.offset);
              $(e).show();
          }
        }
    })
	}
</script>
