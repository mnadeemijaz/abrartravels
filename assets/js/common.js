/**
 * @author Kishor Mali
 */
////////// user listing

jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this user ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	//////////// end user management //////////////////////
	//////////// hotel management  ////////////////////
	jQuery(document).on("click", ".deleteHotel", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteHotel",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Hotel ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Hotel successfully deleted"); }
				else if(data.status = false) { alert("Hotel deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end hotel management ///////////////////////
	//////////// vehicle management  ////////////////////
	jQuery(document).on("click", ".deleteVehicle", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteVehicle",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Vehicle ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Vehicle successfully deleted"); }
				else if(data.status = false) { alert("Vehicle deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end hotel management ///////////////////////
	
	//////////// vehicle Trip management  ////////////////////
	jQuery(document).on("click", ".deleteTrip", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteTrip",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Trip ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Vehicle Trip successfully deleted"); }
				else if(data.status = false) { alert("Vehicle Trip deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end trip management ///////////////////////
	
	//////////// Ziarat management  ////////////////////
	jQuery(document).on("click", ".deleteZiarat", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteZiarat",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Ziarat ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Ziarat successfully deleted"); }
				else if(data.status = false) { alert("Ziarat deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end trip management ///////////////////////
	
	//////////// flight management  ////////////////////
	jQuery(document).on("click", ".deleteFlight", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteFlight",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Flight ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Flight successfully deleted"); }
				else if(data.status = false) { alert("Flight deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end flight management ///////////////////////
	
	//////////// packeg management  ////////////////////
	jQuery(document).on("click", ".deletePackeg", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deletePackeg",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Packeg ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Packeg successfully deleted"); }
				else if(data.status = false) { alert("Packeg deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end flight management ///////////////////////
	
	//////////// sector management  ////////////////////
	jQuery(document).on("click", ".deleteSector", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteSector",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Sector ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Sector successfully deleted"); }
				else if(data.status = false) { alert("Sector deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end sector management ///////////////////////
	
	//////////// visa company management  ////////////////////
	jQuery(document).on("click", ".deleteVisaCompany", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteVisaCompany",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this visa Company ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Visa Company successfully deleted"); }
				else if(data.status = false) { alert("Visa Company deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end visa compnay management ///////////////////////
	
	//////////// agent management  ////////////////////
	jQuery(document).on("click", ".deleteAgent", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteAgent",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Agent ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Agent successfully deleted"); }
				else if(data.status = false) { alert("Agent deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end sector management ///////////////////////
	
	//////////// voucher management  ////////////////////
	jQuery(document).on("click", ".voucherApprove", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "voucherApprove",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to approve this voucher ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				//currentRow.parents('tr').remove();
				if(data.status = true) { alert("Voucher successfully approved"); }
				else if(data.status = false) { alert("Voucher approval failed"); }
				else { alert("Access denied..!"); }
				window.location.reload();
			});
		}
	});
	jQuery(document).on("click", ".voucherNApprove", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "voucherNApprove",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to dis approve this voucher ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				//currentRow.parents('tr').remove();
				if(data.status = true) { alert("Voucher successfully dis approved"); }
				else if(data.status = false) { alert("Voucher dis-approval failed"); }
				else { alert("Access denied..!"); }
				window.location.reload();
			});
		}
	});
	
	jQuery(document).on("click", ".voucherCancel", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "voucherCancel",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to Cancel this voucher ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Voucher successfully Cancled"); }
				else if(data.status = false) { alert("Voucher cancled failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end sector management ///////////////////////
	
});

jQuery(document).on("click", ".visaApprove", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "visaApprove",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to approve Visa ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				//currentRow.parents('tr').remove();
				if(data.status = true) { alert("Visa successfully approved"); }
				else if(data.status = false) { alert("Visa approval failed"); }
				else { alert("Access denied..!"); }
				window.location.reload();
			});
		}
	});
	
	jQuery(document).on("click", ".visaNApprove", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "visaNApprove",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to dis-approve Visa ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				//console.log(data);
				//currentRow.parents('tr').remove();
				if(data.status = true) { alert("Visa successfully dis-approved"); }
				else if(data.status = false) { alert("Visa dis-approval failed"); }
				else { alert("Access denied..!"); }
				window.location.reload();
			});
		}
	});
	
	//////////// ticket sale management  ////////////////////
	jQuery(document).on("click", ".deleteTicket", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteTicket",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this ticket sale record ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("ticket sale record successfully deleted"); }
				else if(data.status = false) { alert("ticket sale record deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	//flight transection 
	jQuery(document).on("click", ".deleteFTransection", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteFTransection",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Flight Transection record successfully deleted"); }
				else if(data.status = false) { alert("Flight Transection record deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});

//////////// bank management  ////////////////////
	jQuery(document).on("click", ".deleteBank", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteBank",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Bank ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Bank successfully deleted"); }
				else if(data.status = false) { alert("Bank deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end bank management ///////////////////////
	
	///////////bank transection
	jQuery(document).on("click", ".deleteBTransection", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteBTransection",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Bank Transection record successfully deleted"); }
				else if(data.status = false) { alert("Bank Transection record deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	//////////// hotel management  ////////////////////
	jQuery(document).on("click", ".deleteClient", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteClient",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Client ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Client successfully deleted"); }
				else if(data.status = false) { alert("Client deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	///////////////end hotel management ///////////////////////
	//////////// bank management  ////////////////////
	jQuery(document).on("click", ".deletepermotion_number", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deletepermotion_number",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this Number ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Number successfully deleted"); }
				else if(data.status = false) { alert("Number deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});