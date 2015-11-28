<tr>
	<td>
		<?=form_dropdown('komponen[]',$this->komponen_mdl->dropdown_komponen(),set_value('komponen[]',''),'required=required class="form-control input-sm"')?>
		<?=form_input(array('name'=>'komponen_lain[]','placeholder'=>'Komponen lain','class'=>'form-control input-sm komponen-lain hide','maxlength'=>'60','autocomplete'=>'off','value'=>set_value('komponen_lain[]','')))?>
	</td>
	<td><?=form_dropdown('aksi[]',$this->servis_mdl->dropdown_aksi(),set_value('aksi[]',''),'required=required class="form-control input-sm"')?></td>
	<td><?=form_input(array('name'=>'satuan[]','class'=>'form-control input-sm input-uang text-right','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('satuan[]',''),'required'=>'required'))?></td>
	<td><?=form_input(array('name'=>'harga[]','class'=>'form-control input-sm input-uang text-right','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('harga[]',''),'required'=>'required'))?></td>
	<td><?=form_input(array('name'=>'total_harga[]','class'=>'form-control input-sm input-uang text-right','maxlength'=>'50','autocomplete'=>'off','value'=>set_value('total_harga[]',''),'readonly'=>'readonly'))?></td>
	<td><a href="javascript:void(0)" class="btn btn-danger btn-sm delete-servis"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
</tr>					
