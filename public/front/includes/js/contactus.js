$(document).ready(function () {
	//registration form validation
	$('#btnSubmit').click(function(){
		$("#contactus").validationEngine({promptPosition : "topRight:-100", scroll: false});
		if($("#contactus").validationEngine('validate')) {
			return true;
		} else { 
			return true;
		}
	});
	
});