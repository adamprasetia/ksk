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
});