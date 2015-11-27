$(document).ready(function(){
	$('#selectAll').click(function(e){
	    var table = $(e.target).closest('table');
	    $('td input:checkbox',table).prop('checked',this.checked);
	});

	$('#delete-btn').click(function(){
		if(confirm('You sure ?')){
			$('.form-check-delete').submit();
		}
	});

	$( ".input-tanggal" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy' 		 
	});

	$('.input-uang').priceFormat({
		prefix: '',
		thousandsSeparator: ',',
		centsLimit: 0
	});

	$('body').on('change','[name="komponen[]"]',function(){
		var komponen = $(this);
		komponen_lain(komponen);
		$.ajax({
			url:base_url+'index.php/komponen/get_harga/'+komponen.val(),
			method:'post',
			success:function(str){
				komponen.parent().next().next().next().children().val(str);
			}
		});
	});
	$('body').on('keyup','[name="satuan[]"]',function(){
		$(this).val(number_format($(this).val()));
		var satuan = parseInt($(this).val().replace(/,/g,''));
		var harga = parseInt($(this).parent().next().children().val().replace(/,/g,''));
		var total = satuan*harga;
		$(this).parent().next().next().children().val(number_format(total.toString()));
	});	
	$('body').on('keyup','[name="harga[]"]',function(){
		$(this).val(number_format($(this).val()));
		var harga = parseInt($(this).val().replace(/,/g,''));
		var satuan = parseInt($(this).parent().prev().children().val().replace(/,/g,''));
		var total = satuan*harga;
		$(this).parent().next().children().val(number_format(total.toString()));
	});	
	$('#tambah-servis').click(function(){
		$.ajax({
			url:base_url+'index.php/servis/tambah_servis/',
			method:'post',
			success:function(str){
				$('.table-servis tbody').append(str);
			}
		});
	});
	$('body').on('click','.delete-servis',function(){
		$(this).parent().parent().remove();
	});

	get_kendaraan($('#kendaraan').val());
	$('#kendaraan').change(function(){
		get_kendaraan($(this).val());
	});
	function get_kendaraan(komponen){
		$.ajax({
			url:base_url+'index.php/kendaraan/get_kendaraan/'+komponen,
			method:'post',
			dataType:'json',
			success:function(str){
				$('#tipe_kendaraan').val(str['tipe']);
				$('#nomes').val(str['nomes']);
				$('#nocha').val(str['nocha']);
			}
		});				
	}
	function komponen_lain(komponen){
		if(komponen.val()=='KOM-27'){
			komponen.next().removeClass('hide');
		}else{
			komponen.next().addClass('hide');
		}
	}
	function number_format(user_input){
	    var filtered_number = user_input.replace(/[^0-9]/gi, '');
	    var length = filtered_number.length;
	    var breakpoint = 1;
	    var formated_number = '';

	    for(i = 1; i <= length; i++){
	        if(breakpoint > 3){
	            breakpoint = 1;
	            formated_number = ',' + formated_number;
	        }
	        var next_letter = i + 1;
	        formated_number = filtered_number.substring(length - i, length - (i - 1)) + formated_number; 

	        breakpoint++;
	    }

	    return formated_number;
	}	
});