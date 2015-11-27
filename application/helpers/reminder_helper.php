<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function olie_mesin_status($lama){
	$r = explode(" ",$lama);
	if($r[0] >= 5 && $r[1]== 'bulan'){
		return '<label class="label label-danger">Danger</label>';
	}elseif($r[0] >= 1 && $r[1]== 'bulan'){
		return '<label class="label label-warning">Warning</label>';
	}elseif($r[0] >= "Belum"){
		return '<label class="label label-primary">Undefined</label>';
	}else{
		return '<label class="label label-success">Sehat</label>';
	}
}