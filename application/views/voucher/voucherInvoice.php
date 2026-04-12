
<?php if($voucher->approve == 'no'){?>
<!--<div id="overlay">
  <div id="text">Overlay Text</div>
</div>-->
<?php }
$doc_fee = 0;
?>
<div id="printit" class="content-wrapper <?php echo ($voucher->approve == 'no')?'back':'';?>" style="padding:10px">
<page size="A4">
    <!-- Content Header (Page header) -->
    <div class="print_head">
    <table class="table">
    	<tr>
        	<td style="vertical-align:bottom"><img class="voucherlogo" src="<?php echo base_url()?>assets/images/<?php echo $agent_config->logo;?>" alt="Company Logo"></td>
            <td align="center"><h3 style="margin:0"><?php echo $agent_config->c_name;?></h3><h5 style="margin:0"><?php echo $agent_config->address;?></h5></td>
            <td class="shirka_class" style="vertical-align:bottom; ">Shirka: <?php echo $voucher->shirka?></td>
        </tr>
    </table>
    </div>
    <!--<div class="pull-right" style="background: #f8bebe;
border-radius: 50%;
font-size: 20px;
padding: 5px;
font-weight: bold;">ABT</div>-->
    <div class="vwraper">
   <div class="vno"> Voucher No : <?php echo $voucher->id?><div class="pull-right">Date Created: <?php echo $voucher->date?></div></div>
   <div class="vheading no-print">Shirka : <?php echo $voucher->shirka?> <div class="pull-right">Party: <?php echo $agent_config->c_name?></div></div>
    <div class="vheading">General Information About Service</div>
    <table class="table vtable" border="1">
    	<tr class="titlebar">
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
            <td><?php echo date_change_view($voucher->arv_date)?></td>
            <td><?php echo date_change_view($voucher->ret_date)?></td>
            <td><?php echo $voucher->nights?></td>
        </tr>
    </table>
    <div class="vheading">KSA Arrival Information </div>
    <table class="table vtable" border="1">
    	<tr class="titlebar">        	
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
            <td><?php echo date_change_view($voucher->dep_date)?></td>
            <td><?php echo $voucher->dep_time?></td>
            <td><?php echo date_change_view($voucher->arv_date)?></td>
            <td><?php echo $voucher->arv_time?></td>
            <td><?php echo $voucher->dep_pnr_no?></td>
        </tr>
    </table>
    <div class="vheading">Departure Information  </div>
    <table class="table vtable" border="1">
    	<tr class="titlebar">        	
            <th>Sector</th>
            <th>Flight No</th>
            <th>Dep Date</th>
            <th>Dep Time</th>
            <th>PNR</th>
        </tr>
        <tr>
        	<td><?php echo $voucher->ret_sector.' - '.$voucher->rsname?></td>
            <td><?php echo $voucher->ret_flight_name.'-'.$voucher->ret_flight_no?></td>
            <td><?php echo date_change_view($voucher->ret_date)?></td>
            <td><?php echo $voucher->ret_time?></td>
            <td><?php echo $voucher->ret_pnr_no?></td>
        </tr>
    </table>
    <div class="vheading"> Accommodation Detail  </div>
    <table class="table vtable" border="1">
    	<tr class="titlebar">        	
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
            <td><?php echo date_change_view($vhotels->check_in)?></td>
            <td><?php echo date_change_view($vhotels->check_out)?></td>
            <td><?php echo $vhotels->city_nights?></td>
            <td><?php echo $vhotels->room_type?></td>
        </tr>
        <?php }?>
        
    </table>
    <div class="vheading ">Transportational Detail </div>
    <table class="table vtable" border="1">
    	<tr class="titlebar">        	
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
    	<tr class="titlebar"> 
        	<th>Sr#</th>       	
            <th>Pilgrim Name</th>
            <th> Ziarat</th>
            <th>Passport No </th>
            <th> DOB</th>
            <th>Age Group </th>
            <th>Visa No</th>
            <th> Issue Date</th>
            <!--<th>Ziarat</th>-->
        </tr>
        <?php $cc=1; $total_fee = 0;$total_bnde = 0;
		foreach($voucher_clients as $clients){
			if($clients->document == 'yes'){
				$total_fee += $clients->document_fee;
			}
			if($clients->child_wo_bed == ''){
				$total_bnde ++;
			}
			?>
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
            <td><?php echo date_change_view($clients->dob)?></td>
            <td><?php echo $clients->age_group?></td>
            <td><?php echo $clients->visa_no?></td>
            <td><?php echo $clients->dob?></td>
        </tr>
        <?php }?>
    </table><table class="table" border="1">
    	<tr><td>Remarks: <?php echo $voucher->remarks?></td></tr>
    </table>
    <div class="vheading">Accounts Detail</div>
    <div class="row">
    	<div class="col-md-7">
            <table class="table vtable" border="">
                <tr class="titlebar"><th colspan="5">Accoumodation Detail</th></tr>
                <tr class="titlebar">
                	<td>Hotel Name</td>
                    <td>Nights</td>
                    <td>Room Type</td>
                    <td>Rate</td>
                    <td>Total</td>
                </tr>
                <?php $ttl = 0; foreach($voucher_hotels as $vhotels){
					$ttl += ($vhotels->hotel_amount*$voucher->sr_rate)*$vhotels->city_nights;
					?>
                <tr>
                    <td><?php echo $vhotels->hotel_name?></td>
                    <td><?php echo $vhotels->city_nights?></td>
                    <td><?php echo $vhotels->room_type?></td>
                    <td><?php echo $vhotels->hotel_amount*$voucher->sr_rate?></td>
                    <td><?php echo ($vhotels->hotel_amount*$voucher->sr_rate)*$vhotels->city_nights?></td>
                </tr>
                <?php }?>                
            </table>
         </div>
         <div class="col-md-5">
            <table class="table vtable" border="1">
                <tr class="titlebar"><th colspan="4">Visa Detail</th></tr>
                <tr><th>&nbsp;</th><th>Adult</th><th>Child</th><th>Infant</th></tr>
                <tr>
                	<td>Count</td>
                    <td><?php echo $voucher->t_adult?></td>
                    <td><?php echo $voucher->t_child?></td>
                    <td><?php echo $voucher->t_infant?></td>
                </tr>
                <tr>
                	<td>Rate</td>
                    <td><?php echo $voucher->adult_rate*$voucher->sr_rate?></td>
                    <td><?php echo $voucher->child_rate*$voucher->sr_rate?></td>
                    <td><?php echo $voucher->infant_rate*$voucher->sr_rate?></td>
                </tr>
            </table>
            <h4>Visa Amount: <?php echo $ttt = ($voucher->t_adult*($voucher->adult_rate*$voucher->sr_rate))+($voucher->t_child*($voucher->child_rate*$voucher->sr_rate))+($voucher->t_infant*($voucher->infant_rate*$voucher->sr_rate))?></h4>
            <?php //$total_bnde = $voucher->t_adult+$voucher->t_child+$voucher->t_infant;?>
            <h4>Accoumodation Amount : <?php echo $ttl_ = $ttl*$total_bnde;?></h4>
            <?php if($total_fee >0){?>
            <h4>Documentation Fee : <?php echo $doc_fee = $total_fee*$voucher->sr_rate;?></h4>
            <?php }?>
            <h4>Transport Amount : <?php echo $trsp = $voucher->trip_amount;?></h4>
            <?php $ziarat_amt = 0; foreach($voucher_ziarat as $vz){
				$ziarat_amt += $vz->ziarat_amount * $voucher->sr_rate;
			}?>
            <h4>Ziarat Amount : <?php echo $ziarat_amt;?></h4>
            <h3>Total : <?php echo $ttt+$ttl_+$trsp+$ziarat_amt+$doc_fee;?></h3>
         </div>
	 </div>
  </div>
  <button name="print" class="btn btn-info no-print" id="printitbtn"> <i class="fa fa-print"> </i> Print</button>
  <a class="btn btn-primary no-print" href="<?php echo base_url()?>voucherInvPDF/<?php echo $voucher->id?>"><i class="fa fa-file-pdf-o "> </i> PDF</a>
  </page>
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

/*$(function(){
	$("#printitbtn").click(function() {
             printElem({ printMode: 'popup' });
         });
})
function printElem(options){
     $('#printit').printElement( 
            { 
            	overrideElementCSS:[ 
				'AdminLTE.css', 
				{	href:'<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css',media:'print',
					 href:'<?php echo base_url(); ?>assets/dist/css/print.css',media:'print'}] 
            }); 
 }*/

$("#printit").find('button').on('click', function() {
                    //Print ele4 with custom options
                    $("#printit").print({
                        //Use Global styles
                        globalStyles : false,
                        //Add link with attrbute media=print
                        mediaPrint : true,
                        //Custom stylesheet
                        //stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
						stylesheet : "<?php echo base_url(); ?>assets/dist/css/print.css",
						//stylesheet : "<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css",
						
                        //Print in a hidden iframe
                   //     iframe : false,
                        //Don't print this
                        noPrintSelector : ".avoid-this",
                        //Add this at top
                       // prepend : "Hello World!!!<br/>",
                        //Add this on bottom
                        //append : "<br/>Buh Bye!",
                        //Log to console when printing is done via a deffered callback
                        deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                    });
                });
</script>