/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addconfigrationForm = $("#configration");
	
	var validator = addconfigrationForm.validate({
		
		rules:{
			name :{ required : true },
			address : { required : true},
			phone : { required : true},
			adult_rate : { required : true, digits : true },
			child_rate : {required : true, digits : true},
			infant_rate : { required : true, digits : true },
			per_page : { required : true, digits : true}
		},
		messages:{
			name :{ required : "This field is required" },
			address : { required : "This field is required"},
			phone : { required : "This field is required" },
			adult_rate : {required : "This field is required", digits : "Please enter numbers only" },
			child_rate : { required : "This field is required", digits : "Please enter numbers only" },
			infant_rate : { required : "This field is required", digits : "Please enter numbers only" },
			per_page : { required : "This field is required", digits : "Please enter numbers only" }			
		}
	});
});
