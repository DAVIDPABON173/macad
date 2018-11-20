function loadDocuments() {
	let documentos = $('#categoria').find('option:selected').data('info');
	let html = '<option value="null" disabled selected>Documentos</option>'
	documentos.forEach(function(item, index){
		html += '<option value="'+item.id+'" data-prefix="'+item.prefijo+'">'+item.documento+'</option>';
	});
	$('#documento').html(html);
}

function setPrefix() {
	let prefix = $('#documento').find('option:selected').data('prefix');
	$('#lbl_prefijo').html('<strong>'+prefix+'</strong>');
}

function getFileName(file, label) {	
	$('.'+label).text($('#'+file).val().split('\\')[2]);
}

$('#sidebar-collapse-btn').on('click', function(event){
	event.preventDefault();
	$("#app").toggleClass("sidebar-open");
});

$('#sidebar-menu li, #doc_types, #files').on('click', function(event){		
	sidebar(this.id);
});

function sidebar(id) {
	localStorage.setItem('active', id);	
	$("#app").removeClass("sidebar-open");	
}

$('.sidebar').on('click', function(event){
	$("#app").removeClass("sidebar-open");	
});

$var = localStorage.getItem('active');
if($var){
	$("#"+$var).toggleClass("active");	
}