$(document).ready(function () {
	//registration form validation
	$('#form1_submit2,#form1_submit3').click(function(){
		$("#frmUser").validationEngine({promptPosition : "topRight:-100", scroll: false});
		if($("#frmUser").validationEngine('validate')) {
			return true;
		} else { 
			return true;
		}
	});
	
 $('#arrival_date').datepicker({ minDate: 0 });
 //$('#birthdate').datepicker({ });
 
  $( ".dob" ).datepicker({
			yearRange: "-80:+0",
			defaultDate : '-18y',
			changeMonth: true,
			changeYear: true, 
			dateFormat: 'yy-mm-dd',
			onSelect: function(dateText) {   
				$(".datepickerformError").fadeOut(150, function() {  
				   $(this).remove();
				});
			}
		});
		$( ".dob" ).datepicker( "option", "showAnim", "clip" );  
		
$.validationEngineLanguage.allRules = $.extend($.validationEngineLanguage.allRules,{ 
					"onlyLetterSp": {
						"regex": /^[a-zA-Z\ \']+$/,
						"alertText": "* Letters only"
					},
					"onlyNumber": {
						"regex": /^[\d ]+$/,
						"alertText": "* Number  only"
					},
					"allowNumberAndChar": {
						"regex": /^[0-9a-zA-Z\ \'\-\,\.\_]+$/,
						"alertText": "* Letters and number only"
					},
					"allForamteContact": {
						"regex": /^(?:\(?([0-9]{3})\)?[-.●]?)?([0-9]{3})[-.●]?([0-9]{4})$/,
						"alertText": "* Contact number is not valid."
					},
					"ajaxUserCall": {
                    // remote json service location
                    "url": siteurl+"signup/usernameCheck",
                    // error
                    "alertText": "* This username is already registered!",
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertTextOk": "* This username is available",
                    // speaks by itself
                    "alertTextLoad": "* Validating, please wait"
					},
					"ajaxEmailCall": {
                    // remote json service location
                    "url": siteurl+"signup/emailCheck",
                    // error
                    "alertText": "* This email id is already registered!",
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertTextOk": "* This email id is available",
                    // speaks by itself
                    "alertTextLoad": "* Validating, please wait"
					},
					
});	

