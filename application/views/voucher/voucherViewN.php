<style>
/*.back{background:url(<?php echo base_url()?>assets/images/voucher.png)}*/

</style>


<div class="content-wrapper  <?php echo ($voucher->approve == 'no')?'back':'';?>" style="padding:10px">
    <!-- Content Header (Page header) -->
    <table class="table print_head">
    	<tr>
        	<td align="right"><img class="voucherlogo" src="<?php echo base_url()?>assets/images/<?php echo $agent_config->logo;?>" alt="Company Logo"></td>
            <td><h1 align="center"><?php echo $agent_config->c_name;?></h1>
		    <h3 align="center"><?php echo $agent_config->address;?></h3></td>
            <td><h3>Shirka: <?php echo $voucher->shirka?></h3></td>
        </tr>
    </table>
    <!--<div class="row">
    	<div class="col-md-2">
        	
        </div>
        <div class="col-md-8">
        	
        </div>
        <div class="col-md-2">
        	
        </div>
    </div>-->
    
    <?php if($voucher->approve == 'no'){?>
  <h3 style="margin:0" align="center">Voucher Not Approved</h3>
  <?php }?>
  <div id="dvnotapproved">
        <div class="notapproved" style="top: 15%; left: 35%;">
        </div>
        <div class="notapproved" style="top: 40%; left: 35%;">
        </div>
        <div class="notapproved" style="top: 65%; left: 35%;">
        </div>
    </div>
  <div class="vwrapernot">
    <div class="vno">Voucher No : <?php echo $voucher->id?><div class="pull-right">Date Created: <?php echo date('d M Y',strtotime($voucher->date))?></div></div>
    <div class="vheading no-print">Shirka : <?php echo $voucher->shirka?><!--<div class="pull-right" style="background: #f8bebe;
border-radius: 50%;
font-size: 20px;
padding: 5px;
font-weight: bold;">ABT</div>--> <div class="pull-right">Party: <?php echo $agent_config->c_name?></div></div>
    <div class="vheading">General Information About Service <div class="pull-right">Group Head Phone: <?php echo $voucher->gp_hd_no?></div></div>
    <table class="table vtable" border="1">
    	<tr class="titlebarnot">
        	<th>Adults</th>
            <th>Child</th>
            <th>Infant</th>
            <th>Arrival Date</th>
            <th>Dep. Date</th>
            <th>Nights</th>
        </tr>
        <tr>
        	<td><?php echo $voucher->t_adult?></td>
            <td><?php echo $voucher->t_child?></td>
            <td><?php echo $voucher->t_infant?></td>
            <td><?php echo date('d M Y',strtotime($voucher->arv_date))?></td>
            <td><?php echo date('d M Y',strtotime($voucher->ret_date))?></td>
            <td><?php echo $voucher->nights?></td>
        </tr>
    </table>
    <div class="vheading">KSA Arrival Information </div>
    <table class="table vtable" border="1">
    	<tr class="titlebarnot">        	
            <th>Sector</th>
            <th>Flight No</th>
            <th>Dep Date</th>
            <th>Dep Time</th>
            <th>Arrival Date</th>
            <th>Arrival Time</th>
            <th>PNR</th>
        </tr>
        <tr>
        	<td><?php echo $voucher->s_name.'-'.$voucher->dep_sector2?></td>
            <td><?php echo $voucher->dep_flight_name.'-'.$voucher->dep_flight_no?></td>
            <td><?php echo date('d M Y',strtotime($voucher->dep_date))?></td>
            <td><?php echo $voucher->dep_time?></td>
            <td><?php echo date('d M Y',strtotime($voucher->arv_date))?></td>
            <td><?php echo $voucher->arv_time?></td>
            <td><?php echo $voucher->dep_pnr_no?></td>
        </tr>
    </table>
   <div class="vheading">Departure Information  </div>
    <table class="table vtable" border="1">
    	<tr class="titlebarnot">        	
            <th>Sector</th>
            <th>Flight No</th>
            <th>Dep Date</th>
            <th>Dep Time</th>
            <th>PNR</th>
        </tr>
        <tr>
        	<td><?php echo $voucher->ret_sector.' - '.$voucher->rsname?></td>
            <td><?php echo $voucher->ret_flight_name.'-'.$voucher->ret_flight_no?></td>
            <td><?php echo date('d M Y',strtotime($voucher->ret_date))?></td>
            <td><?php echo $voucher->ret_time?></td>
            <td><?php echo $voucher->ret_pnr_no?></td>
        </tr>
    </table>
    <div class="vheading"> Accommodation Detail  </div>
    <table class="table vtable" border="1">
    	<tr class="titlebarnot">        	
            <th>City</th>
            <th>Hotel</th>
            <th>Check In Date</th>
            <th>Check Out Date</th>
            <th>Nights</th>
            <th>Room Type</th>
        </tr>
        <?php foreach($voucher_hotels as $vhotels){?>
        <tr>
        	<td><?php echo $vhotels->city_name?></td>
            <td><?php echo $vhotels->hotel_name?></td>
            <td><?php echo date('d M Y',strtotime($vhotels->check_in))?></td>
            <td><?php echo date('d M Y',strtotime($vhotels->check_out))?></td>
            <td><?php echo $vhotels->city_nights?></td>
            <td><?php echo $vhotels->room_type?></td>
        </tr>
        <?php }?>       
    </table>
    <div class="vheading">Transportational Detail </div>
    <table class="table vtable" border="1">
    	<tr class="titlebarnot">        	
            <th>Transport Trip</th>
            <th>Transport By</th>
            <!--<th>Ziarat</th>-->
        </tr>
        <tr>
        	<td><?php echo $voucher->trip_name?></td>
            <td><?php echo $voucher->vehicle_name?></td>            
            <!--<td><?php echo $voucher->arv_time?></td>-->
        </tr>
    </table>
    <div class="vheading">Mutamer's (Pilgrims) Detail </div>
    <table class="table vtable" border="1">
    	<tr class="titlebarnot"> 
        	<th>Sr#</th>       	
            <th>Pilgrim Name</th>
            <th>Ziarat</th>
            <th>Passport No </th>
            <th> DOB</th>
            <th>Age Group </th>
            <th>Visa No</th>
            <th> Issue Date</th>
            <!--<th>Ziarat</th>-->
        </tr>
        <?php $cc = 1; foreach($voucher_clients as $clients){?>
        <tr>
        	<td><?php echo $cc++?></td>
        	<td><?php echo $clients->sr_name.' '.$clients->name.' '.$clients->last_name; echo ($clients->child_wo_bed)?' &nbsp;&nbsp;&nbsp;&nbsp;( Without Bed)':'';?></td>
            <td><?php if($clients->ziarat == 'yes'){
				foreach($voucher_ziarat as $vz){
					if($vz->ziarat_amount)
						echo $vz->name.', ';
				}
				}?></td>
            <td><?php echo $clients->ppno?></td>
            <td><?php echo date('d M Y',strtotime($clients->dob))?></td>
            <td><?php echo $clients->age_group?></td>
            <td><?php echo $clients->visa_no?></td>
            <td><?php echo date('d M Y',strtotime($clients->visa_date))?></td>
        </tr>
        <?php }?>
    </table>
    <table class="table vtable" border="1">
    	<tr><td><span class="remarks">Remarks:</span> <?php echo $voucher->remarks?></td></tr>
    </table>
    <img class="insImage" width="100%" src="<?php echo base_url()?>assets/images/al_abarar.jpg" alt="hdayat">
    <?php if($voucher->approve == 'no'){?>
   <!--<img width="100%" src="<?php echo base_url()?>assets/images/voucher.png" alt="hdayat">-->
   <?php }?>
<table class="table vtable vheading" border="1">
<?php if($voucher->contact == 'only_transport'){?>
<tr>
	<td>Makkah </td>
    <td>Name: <?php echo $config->only_transport_name?> </td>
    <td> PH: <?php echo $config->only_transport?></td>
</tr>
<tr>
	<td>Madina: </td>
    <td>Name: <?php echo $config->only_transport_name_mad?> </td>
    <td> PH: <?php echo $config->only_transport_mad?></td>
</tr>
<?php } else {?>
    <tr>
	<td>Makkah </td>
    <td>Name: <?php echo $config->mak_name?></td>
    <td>PH: <?php echo $config->mak_cont?></td>
    <td>Name: <?php echo $config->mak_name1?></td>
    <td>PH: <?php echo $config->mak_cont1?></td>
</tr>
<tr>        
	<td>Madina: </td>
    <td>Name: <?php echo $config->mad_name?></td>
    <td>PH: <?php echo $config->mad_cont?></td>
    <td>Name: <?php echo $config->mad_name1?></td>
    <td>PH: <?php echo $config->mad_cont1?></td>
</tr>
<?php }?>
</table>
</div>
</div>
<script>
function parseDate(str) {//alert(str);
	var mdy_ = str.split(' ~ ');
	//alert(mdy_[0]);
    var mdy = mdy_[0].split('/');
	//var dd = mdy[2]+'-'+mdy[0]-1+'-'+mdy[1];
    return mdy[2]+'-'+mdy[1]+'-'+mdy[0];
}

function datediff(first, second) {    
    return Math.round((second-first)/(1000*60*60*24));
}
$('#count_nights').click(function (){
	var dep = $('#dep').val();
	var newdep = parseDate(dep);
	var return_ = $('#ret').val();	
	var newreturn_ = parseDate(return_);
	var start = moment(newdep);
	var end = moment(newreturn_);	
	var days = end.diff(start, "days");	
	$('#nights').val(days);
});
function nights1(){
	var check_in1 = $('#check_in1').val();
	var check_out1 = $('#check_out1').val();
	var newcheckin1 = parseDate(check_in1);
	var newcheckout1 = parseDate(check_out1);
	var start = moment(newcheckin1);
	var end = moment(newcheckout1);	
	var days = end.diff(start, "days");	
	$('#city_night1').val(days);
}
function nights2(){
	var check_in2 = $('#check_in2').val();
	var check_out2 = $('#check_out2').val();
	var newcheckin2 = parseDate(check_in2);
	var newcheckout2 = parseDate(check_out2);
	var start = moment(newcheckin2);
	var end = moment(newcheckout2);	
	var days = end.diff(start, "days");	
	$('#city_night2').val(days);
}
function nights3(){
	var check_in3 = $('#check_in3').val();
	var check_out3 = $('#check_out3').val();
	var newcheckin3 = parseDate(check_in3);
	var newcheckout3 = parseDate(check_out3);
	var start = moment(newcheckin3);
	var end = moment(newcheckout3);	
	var days = end.diff(start, "days");	
	$('#city_night3').val(days);
}
function get_hotel_city1(city_name) {
var room_type = $('#room_type1').val();
	$.ajax({
		url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type,
		success: function(response)
		{
			jQuery('#hotel1').html(response);
		}
	});
}
function get_hotel_room1(room_type) {
var city_name = $('#city_name1').val();
	$.ajax({
		url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type,
		success: function(response)
		{
			jQuery('#hotel1').html(response);
		}
	});
}
function get_hotel_city2(city_name) {
var room_type = $('#room_type2').val();
	$.ajax({
		url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type,
		success: function(response)
		{
			jQuery('#hotel2').html(response);
		}
	});
}
function get_hotel_room2(room_type) {
var city_name = $('#city_name2').val();
	$.ajax({
		url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type,
		success: function(response)
		{
			jQuery('#hotel2').html(response);
		}
	});
}
function get_hotel_city3(city_name) {
var room_type = $('#room_type3').val();
	$.ajax({
		url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type,
		success: function(response)
		{
			jQuery('#hotel3').html(response);
		}
	});
}
function get_hotel_room3(room_type) {
var city_name = $('#city_name3').val();
	$.ajax({
		url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type,
		success: function(response)
		{
			jQuery('#hotel3').html(response);
		}
	});
}

function get_trip(vehicle_id) {//alert('adf ');
	$.ajax({
		url: '<?php echo base_url();?>selectTrip/'+ vehicle_id,
		success: function(response)
		{
			jQuery('#trips').html(response);
		}
	});
}

//alert(datediff(parseDate(first.value), parseDate(second.value)));
</script>