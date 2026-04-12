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
	
	var addHotelForm = $("#add_hotel");
	
	var validator = addHotelForm.validate({
		
		rules:{
			name :{ required : true },
			//address : { required : true},
			room_type : { required : true },
			//rate : {required : true},
			city_name : { required : true},
			pkg_type : { required : true}
		},
		messages:{
			name :{ required : "Name field is required" },
			//address : { required : "Address field is required"},
			room_type : { required : "Roome Type field is required" },
			//rate : {required : "Rate field is required"},
			city_name : { required : "City Name field is required"},
			pkg_type : { required : "Packeg Type Name field is required"},			
		}
	});
	
	//////////vehicle management//////////////////
	
	
	var addVehicleForm = $("#add_vehicle");
	
	var validator = addVehicleForm.validate({
		
		rules:{
			name :{ required : true },
			sharing :{ required : true },
			
			//role : { required : true, selected : true}
		},
		messages:{
			name :{ required : "Name field is required" },
			sharing :{ required : "Sharing field is required" },
						
		}
	});
///////////////end vehicle management

//////////vehicle trip management//////////////////
	var addTripForm = $("#add_trip");	
	var validator = addTripForm.validate({		
		rules:{
			name :{ required : true },
			price :{ required : true },
			vehicle_id :{ required : true },

		},
		messages:{
			name :{ required : "Name field is required" },
			price :{ required : "Price field is required" },
			vehicle_id :{ required : "Sharing field is required" },
		}
	});
///////////////end vehicle trip management

//////////Ziarat management//////////////////
	var addZiaratForm = $("#add_ziarat");	
	var validator = addZiaratForm.validate({		
		rules:{
			name :{ required : true },
			amount :{ required : true },

		},
		messages:{
			name :{ required : "Name field is required" },
			amount :{ required : "Amount field is required" }
		}
	});
///////////////end Ziarat management

//////////flight management//////////////////
	var addFlightForm = $("#add_flight");	
	var validator = addFlightForm.validate({		
		rules:{
			name :{ required : true },

		},
		messages:{
			name :{ required : "Name field is required" },
		}
	});
///////////////end Flight management

//////////Packeg management//////////////////
	var addPackegForm = $("#add_packeg");	
	var validator = addPackegForm.validate({		
		rules:{
			name :{ required : true },

		},
		messages:{
			name :{ required : "Name field is required" },
		}
	});
///////////////end Packeg management

//////////Sector management//////////////////
	var addSectorForm = $("#add_sector");	
	var validator = addSectorForm.validate({		
		rules:{
			name :{ required : true },

		},
		messages:{
			name :{ required : "Name field is required" },
		}
	});
///////////////end Ziarat management
//////////visa company management//////////////////
	var addVisaCompanyForm = $("#add_visaCompany");	
	var validator = addVisaCompanyForm.validate({		
		rules:{
			name :{ required : true },

		},
		messages:{
			name :{ required : "Name field is required" },
		}
	});
///////////////end visa company management

//////////agent management//////////////////
	var addAgentForm = $("#add_agent");	
	var validator = addAgentForm.validate({		
		rules:{
			name :{ required : true },
			address :{ required : true },
			cnic :{ required : true },
			email_id : { required : true, email : true, remote : { url : baseURL + "checkEmailExists1", type :"post" , data : { id : function(){ return $("#id").val(); } }}  },
			agrement :{ required : true },

		},
		messages:{
			name :{ required : "Name field is required" },
			address :{ required : "Address field is required" },
			cnic :{ required : "CNIC field is required" },
			email_id : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
			agrement :{ required : "Agrement field is required" },
		}
	});
///////////////end agent management

//////////Client management//////////////////
	var addClientForm = $("#add_client");	
	var validator = addClientForm.validate({		
		rules:{
			name :{ required : true },
			address :{ required : true },
			last_name :{ required : true },
			ppno : { required : true, remote : { url : baseURL + "checkPassportNo", type :"post" , data : { id : function(){ return $("#id").val(); } }}  },
			passport_issue_date :{ required : true },
			passport_exp_date :{ required : true },
			dob :{ required : true },
			age_group :{ required : true },			
			agent_id :{ required : true },
			account_pkg :{ required : true },			

		},
		messages:{
			name :{ required : "Name field is required" },
			address :{ required : "Address field is required" },
			last_name :{ required : "Last Name field is required" },
			ppno : { required : "This field is required", remote : "Passport No Already Exist" },
			passport_issue_date :{ required : "Passport Issue Date field is required" },
			passport_exp_date :{ required : "Passport Expiry Date field is required" },
			dob :{ required : "Date Of Birth field is required" },
			age_group :{ required : "Age Group field is required" },
			agent_id :{ required : "Agent Name field is required" },
			account_pkg :{ required : "Account Packeg field is required" },
			
		}
	});
///////////////end Client management

//////////voucher management//////////////////voucher
	var addVoucherForm = $("#voucher");	
	var validator = addVoucherForm.validate({		
		rules:{
			dep :{ required : true },
			arv :{ required : true },
			sector :{ required : true },			
			sector2 :{ required : true },
			dep_flight :{ required : true },
			dep_flight_no :{ required : true },
			dep_pnr_no :{ required : true },			
			ret_sector :{ required : true },
			ret_sector2 :{ required : true },
			ret_flight :{ required : true },
			ret_flight_no :{ required : true },
			ret_pnr_no :{ required : true },
			ret :{ required : true },
			nights :{ required : true },
			vehicle :{ required : true },
			trip :{ required : true },
			city_name1 :{ required : true },
			city_name2 :{ required : true },
			city_name3 :{ required : true },
			city_night1 :{ required : true },
			city_night2 :{ required : true },
			city_night3 :{ required : true },
			check_in1 :{ required : true },
			check_in2 :{ required : true },
			check_in3 :{ required : true },
			check_out1 :{ required : true },
			check_out2 :{ required : true },
			check_out3 :{ required : true },
			hotel1 :{ required : true },
			hotel2 :{ required : true },
			hotel3 :{ required : true },
			room_type1 :{ required : true },
			room_type2 :{ required : true },
			room_type3 :{ required : true },
			visa_no :{ required : true },
			visa_date :{ required : true },
			child_wo_bed :{ required : true },

		},
		messages:{
			dep :{ required : "This field is required"  },
			arv :{ required : "This field is required" },
			sector :{ required : "This field is required" },			
			sector2 :{ required : "This field is required" },
			dep_flight :{ required : "This field is required" },
			dep_flight_no :{ required : "This field is required" },
			dep_pnr_no :{ required : "This field is required" },			
			ret_sector :{ required : "This field is required" },
			ret_sector2 :{ required : "This field is required" },
			ret_flight :{ required : "This field is required" },
			ret_flight_no :{ required : "This field is required" },
			ret_pnr_no :{ required : "This field is required" },
			ret :{ required : "This field is required" },
			nights :{ required : "This field is required" },
			vehicle :{ required : "This field is required" },
			trip :{ required : "This field is required" },
			city_name1 :{ required : "This field is required" },
			city_name2 :{ required : "This field is required" },
			city_name3 :{ required : "This field is required" },
			city_night1 :{ required : "This field is required" },
			city_night2 :{ required : "This field is required" },
			city_night3 :{ required : "This field is required" },
			check_in1 :{ required : "This field is required" },
			check_in2 :{ required : "This field is required" },
			check_in3 :{ required : "This field is required" },
			check_out1 :{ required : "This field is required" },
			check_out2 :{ required : "This field is required" },
			check_out3 :{ required : "This field is required" },
			hotel1 :{ required : "This field is required" },
			hotel2 :{ required : "This field is required" },
			hotel3 :{ required : "This field is required" },
			room_type1 :{ required : "This field is required" },
			room_type2 :{ required : "This field is required" },
			room_type3 :{ required : "This field is required" },
			visa_no :{ required : "This field is required" },
			visa_date :{ required : "This field is required" },
			child_wo_bed :{ required : "This field is required" }
			
		}
	});
///////////////end voucher management

});
