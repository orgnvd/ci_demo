$(document).ready(function() {
	var url = window.location.protocol + "//" + window.location.host + "/";
	if(url == 'http://192.168.1.4/'){
		var base_url =url+'mahindra/';
	}else{
		var base_url =window.location.protocol + "//" + window.location.host + "/";
	}
	
	
	
	$(document).on('click', '.gallery_status_active', function() {
	//	$('.gallery_status_active').on('click', function(){
			row_id = $(this).attr('row_id');
            status = $(this).attr('status');
            if (status == '1') {
                var r = confirm("Are you sure you want to Activate");
            } else {
                var r = confirm("Are you sure you want to De-Activate");
            }
            if (r == true){
                $.ajax({
					url: base_url+'products/galleryUpdateStatus/',
					type: 'POST',
					datatype: 'json',
					data: {'row_id':row_id,'status':status},
					success: function(response){
						if(response){
						obj = JSON.parse(response);
						$('.gallery_image_status_'+row_id).html(obj.data);	
						}
					},
					error: function(){
					   
					}
				});
            }
        });
	
	
		$('.select-tags').selectize({
			plugins: ['remove_button'],
			persist: true,
			render: {
				item: function(data, escape) {
					return '<div>' + escape(data.text) + '</div>';
				}
			},
			
		});
		$("#product_country").selectize();
		$("#langauge").change(function() {
			$.post(base_url+'cms/ajax_country_list', { 'language_id' : $(this).val() } , function(jsondata) {
				var htmldata = '';
				var new_value_options   = '[';
				for (var key in jsondata) {
					htmldata += '<option value="'+jsondata[key].country_id+'">'+jsondata[key].country_name+'</option>';

					var keyPlus = parseInt(key) + 1;
					if (keyPlus == jsondata.length) {
						new_value_options += '{text: "'+jsondata[key].country_name+'", value: '+jsondata[key].country_id+'}';
					} else {
						new_value_options += '{text: "'+jsondata[key].country_name+'", value: '+jsondata[key].country_id+'},';
					}
				}
				new_value_options   += ']';
				//convert to json object
				new_value_options = eval('(' + new_value_options + ')');
				if (new_value_options[0] != undefined) {
					// re-fill html select option field 
					$("#product_country").html(htmldata);
					// re-fill/set the selectize values
					var selectize = $("#product_country")[0].selectize;

					selectize.clear();
					selectize.clearOptions();
					selectize.renderCache['option'] = {};
					selectize.renderCache['item'] = {};

					selectize.addOption(new_value_options);

					//selectize.setValue(new_value_options[0].value);
					selectize.setValue(new_value_options.value);
				}

			}, 'json');
		});

	/* $('#langauge').on('change', function(){
		
		var lang_id = $('#langauge'). val(); 
			$.ajax({
				url: base_url+'products/ajax_getCountryList/',
				type: 'POST',
				datatype: 'json',
				data: {'lang_id':lang_id},
				success: function(response){
					if(response){
						obj = JSON.parse(response);
						$('#countryMap').html(obj.html);
					}
				},
			})
	}); */
	
	
	
	 $("#category_id").on('change', function(){
			var business_cate_id = $('#category_id'). val(); 
			$.ajax({
				url: base_url + 'products/ajax_categoryList/',
				type: 'POST',
				datatype: 'json',
				data: {'business_cate_id':business_cate_id},
				success: function(response){
					if(response){
						obj = JSON.parse(response);
						$('#last_category_list').html(obj.html);
					}
				},
			}); 
		});
//### this script for enabled and disabled prodouct page tabing....    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');
    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    })
    
     $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        $(this).remove();
    })
	
	$('#activate-step-5').on('click', function(e) {
        $('ul.setup-panel li:eq(4)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-5"]').trigger('click');
        $(this).remove();
    })
    
  // end enabled and disabled product tab script
   
   
   
});
// upload image name display in text box.....

$(function() {
  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });
  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {
          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;
          if( input.length ) {
              input.val(log);
          } else {
              //if( log ) alert(log);
          }
      });
  });
  
});

 function getFormPoopulate(){
	 var url = window.location.protocol + "//" + window.location.host + "/";
		if(url == 'http://192.168.1.4/'){
			var base_url =url+'mahindra/';
		}else{
			var base_url =window.location.protocol + "//" + window.location.host + "/";
		}
	 
	var last_cate_id = $('#config_category_id').val();
	var category_id = $('#category_id').val();
			$.ajax({
				url: base_url+'products/ajax_productCharaisticForm/',
				type: 'POST',
				datatype: 'json',
				data: {'category_id':category_id, 'last_cate_id' : last_cate_id},
				success: function(response){
					if(response){
						obj = JSON.parse(response);
						if(obj.status!="false"){
							$('#ajax_productCharaisticForm').html(obj.html);
						}else{
							alert('Characteristics group must be assign for this category.');
							$('#remove_this').remove();
							return false;
						}
						
					}
				},
			})
	
	
}
