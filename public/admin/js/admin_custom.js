$(document).ready(function () {
 
	window.setTimeout(function() {
		$(".alert").fadeTo(1500, 0).slideUp(1000, function(){
			$(this).remove(); 
		});
	}, 3000);

/*
for langauge change in all country  specfic.
it's modified from hooks.
controller call from root controller.
*/
	 $('.changeLangauge').on('change', function(){
		  var language =  $('.changeLangauge').val();
		  var url = '<?php echo base_url();?>';
		$.ajax({
			url: 'http://192.168.1.4/mahindra/LangSwitch/switchLanguage/',
			type: 'POST',
			datatype: 'json',
			data: {'language':language},
			success: function(data){
				if(data){
				//var url = window.location.href; 
				location.reload();
				}
			},
			error: function(){
			   
			}
	   });
			
	  });
	
	

 
});