<!DOCTYPE html>
<html>
  <head>
  <style>
html,
body {
  min-height: 100%;
}
.table{
	width:100%;
}
.pull-right{
	float:right !important;
}
.voucherlogo{
	width:100px;}
.insImage{
	width:100%;
	height:250px;}

h1, .h1, h2, .h2, h3, .h3,h4, .h4,h5, .h5,h6, .h6 {
    margin-top: 1px;
    margin-bottom: 1px;
}

.colmd{
	padding-right: 2px;
padding-left: 2px;}
.vno{
	font-size: 18px;
	font-weight: bold;
	line-height: 1px;
	height: auto;
	padding: 12px 12px 13px;
	color: #216335 !important;
	border-top: 2px solid #DEDEDE !important;
	background: #ffff !important;
	border-top-left-radius:11px;
	border-top-right-radius:11px;
	}
.vheading{
	font-weight: bold !important;
	font-size: 18px !important;
	padding-right: 10px !important;
	color: #216335 !important;
}
.vwraper{
	
	border: 2px solid #DEDEDE !important;
	padding: 9px !important;
	border-top-left-radius: 10px !important;
	border-top-right-radius: 10px !important;
}
.remarks{
	font-weight:bold !important;
	font-size:11pt !important;
	background:#216335 !important;
	color:#fff !important }
	.titlebar{
		background:#216335 !important;
	color:#ffffff !important}
	
.vtable > tbody > tr > th,
.vtable > thead > tr > th,
.vtable > tbody > tr > td,
.vtable > thead > tr > th,
.vtable > tfoot > tr > td,
.vtable > tr > th,
.vtable > tr > th,
.vtable > tr > td,
.vtable > tr > th,
.vtable > tr > td
 {
    padding: 1px;
}

page[size="A4"] {
  background: white;width: 21cm;height: 29.7cm;display: block;margin: 0;box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
body, page[size="A4"] {
    margin: 0;
    box-shadow: 0;
  }
  </style>
  <!--  <link href="<?php echo base_url(); ?>assets/dist/css/pdf.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="<?php echo base_url(); ?>assets/dist/css/print.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" /> -->   
    </head>
    <body style="background: white;width: 21cm;height: 29.7cm;display: block;margin: 0;box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);">
<page size="A4">
    <table class="table">
    	<tr>
        	<td style="vertical-align:bottom"><img class="voucherlogo" src="<?php echo base_url()?>assets/images/<?php echo $agent_config->logo;?>" alt="Company Logo"></td>
            <td align="center"><h3 style="margin:0"><?php echo $agent_config->c_name;?></h3><h5 style="margin:0"><?php echo $agent_config->address;?></h5></td>
            <td class="shirka_class" style="vertical-align:bottom; ">Shirka: <?php echo $voucher->shirka?></td>
        </tr>
    </table>
  <div class="vwraper">
  <table class="table">
  	<tr>
    	<td>Voucher No : <?php echo $voucher->id?> </td>
        <td align="right">Date Created: <?php echo date('d M Y',strtotime($voucher->date))?></td>
    </tr>
    <tr>
    	<td>General Information About Service </td>
        <td align="right">Group Head Phone: <?php echo $voucher->gp_hd_no?></td>
    </tr>
  </table>
    <!--<div class="vheading">
    	Voucher No : <?php echo $voucher->id?> 
    	<div class="pull-right" style="float:right;">
        	Date Created: <?php echo date('d M Y',strtotime($voucher->date))?>
        </div>
    </div>
    <div class="vheading">
    	General Information About Service 
        <div class="pull-right" style="float:right">
        	Group Head Phone: <?php echo $voucher->gp_hd_no?>
        </div>
    </div>-->
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
            <td><?php echo date('d M Y',strtotime($voucher->arv_date))?></td>
            <td><?php echo date('d M Y',strtotime($voucher->ret_date))?></td>
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
            <td><?php echo date('d M Y',strtotime($voucher->dep_date))?></td>
            <td><?php echo $voucher->dep_time?></td>
            <td><?php echo date('d M Y',strtotime($voucher->arv_date))?></td>
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
            <td><?php echo date('d M Y',strtotime($voucher->ret_date))?></td>
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
            <td><?php echo date('d M Y',strtotime($vhotels->check_in))?></td>
            <td><?php echo date('d M Y',strtotime($vhotels->check_out))?></td>
            <td><?php echo $vhotels->city_nights?></td>
            <td><?php echo $vhotels->room_type?></td>
        </tr>
        <?php }?>       
    </table>
    <div class="vheading">Transportational Detail </div>
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
            <th>Passport No </th>
            <th> DOB</th>
            <th>Age Group </th>
            <th>Visa No</th>
            <th> Issue Date</th>
            <!--<th>Ziarat</th>-->
        </tr>
        <?php $cc=1; foreach($voucher_clients as $clients){?>
        <tr>
        	<td><?php echo $cc++;?></td>
        	<td><?php echo $clients->sr_name.' '.$clients->name.' '.$clients->last_name; echo ($clients->child_wo_bed)?' &nbsp;&nbsp;&nbsp;&nbsp;( Without Bed)':'';?></td>
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
        <tr><td><img style="width: 100%;height: 150px;float: right;" class="insImage" width="100%" src="<?php echo base_url()?>assets/images/al_abarar.jpg" alt="hdayat"></td></tr>
    </table>
    <!--<img style="width: 100%;height: 150px;float: right;" class="insImage" width="100%" src="<?php echo base_url()?>assets/images/al_abarar.jpg" alt="hdayat">-->
    <?php if($voucher->approve == 'no'){?>
   <!--<img width="100%" src="<?php echo base_url()?>assets/images/voucher.png" alt="hdayat">-->
   <?php }?><br>
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
</page>
</body></html>