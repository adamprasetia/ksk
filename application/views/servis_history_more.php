<?php foreach($result as $r):?>
<tr>
	<td><?=++$offset?></td>
	<td><?=format_dmy($r->tanggal)?></td>
	<td><?=timeago(strtotime($r->tanggal))?></td>
	<td><?=($r->komponen_lain<>''?$r->komponen_lain:$r->komponen_nama)?></td>
	<td><?=$r->servis_aksi_nama?></td>
</tr>
<?php endforeach;?>