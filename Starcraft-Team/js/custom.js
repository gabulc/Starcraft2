$(document).ready(function(){

	$('#datagrid tbody tr').click(function(){		
		var tds=$(this).children();
		$('#txtNombre').attr('value',tds[1].innerHtml);		
		$('#frmDatos').slideDown('slow');
	});
	
	$('#frmDatos input[type=reset]').click(function(){
		$('#frmDatos').slideUp('slow');		
	});
	
	$('.search input').focus(function(){
		$('.search input').attr('value','');
	});
	
	$('.search input').blur(function(){
		$('.search input').attr('value','Buscar');
	});
});