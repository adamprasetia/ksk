<section class="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo number_format($this->kendaraan_mdl->count_all()) ?></h3>
          <p>Kendaraan</p>
        </div>
        <div class="icon">
          <i class="ion-android-car"></i>
        </div>
        <?php echo anchor('kendaraan','More info <i class="fa fa-arrow-circle-right"></i>',array('class'=>'small-box-footer')) ?>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo number_format($this->user_mdl->count_all()) ?></h3>
          <p>User</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <?php echo anchor('user','More info <i class="fa fa-arrow-circle-right"></i>',array('class'=>'small-box-footer')) ?>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo number_format($this->komponen_mdl->count_all()) ?></h3>
          <p>Komponen</p>
        </div>
        <div class="icon">
          <i class="ion ion-gear-a"></i>
        </div>
        <?php echo anchor('komponen','More info <i class="fa fa-arrow-circle-right"></i>',array('class'=>'small-box-footer')) ?>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo number_format($this->anggaran_mdl->count_all()) ?></h3>
          <p>Anggaran</p>
        </div>
        <div class="icon">
          <i class="ion ion-cash"></i>
        </div>
        <?php echo anchor('anggaran','More info <i class="fa fa-arrow-circle-right"></i>',array('class'=>'small-box-footer')) ?>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
  	<div class="row">
	    <div class="col-lg-6 col-xs-6">
			<div class="box box-default">
				<div class="box-header">
					Reminder Ganti Oli Mesin	
				</div>	
				<div class="box-body">
					<div class="table-responsive">
						<?=$reminder_oli_mesin?>
					</div>	
					<p>Keterangan :</p>
					<ul>
						<li><label class="label label-primary">undefined</label> : Belum Pernah Ganti Oli</li>	
						<li><label class="label label-success">sehat</label> : Ganti olie sebulan sekali</li>	
						<li><label class="label label-warning">warning</label> : Telat ganti olie 1 bulan</li>	
						<li><label class="label label-danger">danger</label> : Telat ganti olie lebih dari 4 bulan</li>	
					</ul>	
				</div>	
			</div>	
	    </div>	
	    <div class="col-lg-6 col-xs-6">
			<div class="box panel-default">
				<div class="box-header">
					Reminder Tuneup	
				</div>	
				<div class="box-body">
					<div class="table-responsive">
						<?=$reminder_tunup?>
					</div>	
					<p>Keterangan :</p>
					<ul>
						<li><label class="label label-primary">undefined</label> : Belum Pernah Tuneup</li>	
						<li><label class="label label-success">sehat</label> : Tuneup 4 Bulan Sekali</li>	
						<li><label class="label label-warning">warning</label> : Telat tuneup lebih dari 4 bulan</li>	
						<li><label class="label label-danger">danger</label> : Telat tuneup lebih dari 8 bulan</li>	
					</ul>	
				</div>	
			</div>		
	    </div>	
	</div>	
	<!-- LINE CHART -->
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Anggaran Chart</h3>
		</div>
		<div class="box-body chart-responsive">
			<div class="chart" id="line-chart" style="height: 300px;"></div>
		</div>
	</div>
</section>
<!-- page script -->
<script>
	$('document').ready(function(){
		$.ajax({
			url:'<?php echo base_url("index.php/anggaran/chart") ?>',
			type:'post',
			dataType:'json',
			success:function(str){
			    // LINE CHART
			    var line = new Morris.Line({
			      element: 'line-chart',
			      resize: true,
			      data: str,
			      xkey: 'y',
			      ykeys: ['item1'],
			      labels: ['Total'],
			      lineColors: ['#3c8dbc'],
			      hideHover: 'auto'
			    });
				console.log('success');
			}
		});
	});
</script>

