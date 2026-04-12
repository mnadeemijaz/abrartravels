<?php 
if(isset($voucherInfo)){
	if($voucherInfo->id){
		$url = 'edit_voucher';
	}
	else{
		$url = 'createVoucher';
	}
}
else $url = 'createVoucher';

//echo $voucherInfo->agent_id;die();
$this->session->set_userdata('voucher_agent',$voucherInfo->agent_id);
?>

<div class="content-wrapper" style="padding:5px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i> Edit Voucher
        <small>Add / Edit Voucher</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
			<form name="voucher" id="voucher" method="post" action="<?php echo base_url().$url?>">
            <?php if(isset($voucherInfo)){?>
            	<input type="hidden" name="id" value="<?php echo $voucherInfo->id?>">
            <?php }?>
            <div class="panel panel-primary">
            	<div class="panel-heading">
                	Flight Information 
                </div>
                <div class="panel-body">
                <h4>Departure</h4>
                <div class="row">
                	<div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<label>Departure Date and Time </label>
                            <input name="dep" class="form-control datetimeeidt"  id="dep" value="<?php echo date('d/m/Y',strtotime($voucherInfo->dep_date)).' ~ '.date('h:i A',strtotime($voucherInfo->dep_time))?>" onchange="depp()">
                        </div>
                    </div>
                    <div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<label>Arival Date and Time</label>
                            <input name="arv" class="form-control datetimeeidt" id="arv" value="<?php echo date('d/m/Y',strtotime($voucherInfo->arv_date)).' ~ '.date('h:i A',strtotime($voucherInfo->arv_time))?>">
                        </div>
                    </div>
                    <div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<div class="col-md-6 colmd">
                        	<label>Sector</label>
                            <select name="sector" class="form-control" id="sector">
                            	<option value="">select</option>
                            	<?php foreach($sectors as $sec){?>
                                <option value="<?php echo $sec->id?>" <?php echo ($sec->id == $voucherInfo->dep_sector)?'selected="selected"':''?>><?php echo $sec->name?></option>
                                <?php }?>
                            </select> - </div>
                            <div class="col-md-6 colmd">
                            <label>To</label>
                            <select name="sector2" class="form-control" onchange="changeCity()" id="sector2">
                            	<option value="">select</option>
                            	<option value="JED" <?php echo ($voucherInfo->dep_sector2 == 'JED')?'selected="selected"':''?>>JED</option>
                                <option value="MED" <?php echo ($voucherInfo->dep_sector2 == 'MED')?'selected="selected"':''?>>MED</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                    	<div class="form-group">
                        	<div class="col-md-6 colmd">
                        	<label>Flight</label>
                            <select name="dep_flight" id="dep_flight" class="form-control">
                            	<option value="">select</option>
                            	<?php foreach($flights as $flt){?>
                                <option value="<?php echo $flt->id?>" <?php echo ($flt->id == $voucherInfo->dep_flight)?'selected="selected"':''?>><?php echo $flt->name?></option>
                                <?php }?>
                            </select></div>
                            <div class="col-md-6 colmd">
                            <label>No</label>
                            <input name="dep_flight_no" id="dep_flight_no" value="<?php echo $voucherInfo->dep_flight_no?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 colmd">
                        <label>PNR No</label>
                        <input name="dep_pnr_no" value="<?php echo $voucherInfo->dep_pnr_no?>" id="dep_pnr_no" class="form-control">
                    </div>
                </div>
                <h4>Return</h4>
                <div class="row">
                	<div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<div class="col-md-6 colmd">
                        	<label>Sector</label>
                            <select name="ret_sector" id="ret_sector" class="form-control" onchange="changeCityR()">
                            	<option value="">select</option>
                                <option value="MED" <?php echo ($voucherInfo->ret_sector == 'MED')?'selected="selected"':''?>>MED</option>
                                <option value="JED" <?php echo ($voucherInfo->ret_sector == 'JED')?'selected="selected"':''?>>JED</option>
                            	
                            </select> - </div>
                            <div class="col-md-6 colmd">
                            <label>To</label>
                            <select name="ret_sector2" id="ret_sector2" class="form-control">
                            	<option value="">select</option>
                            	<?php foreach($sectors as $sec){?>
                                <option value="<?php echo $sec->id?>" <?php echo ($sec->id == $voucherInfo->ret_sector2)?'selected="selected"':''?>><?php echo $sec->name?></option>
                                <?php }?>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 colmd">
                    	<div class="form-group">
                        	<div class="col-md-6 colmd">
                        	<label>Flight</label>
                            <select name="ret_flight" id="ret_flight" class="form-control">
                            	<option value="">select</option>
                            	<?php foreach($flights as $flt){?>
                                <option value="<?php echo $flt->id?>" <?php echo ($flt->id == $voucherInfo->ret_flight)?'selected="selected"':''?>><?php echo $flt->name?></option>
                                <?php }?>
                            </select></div>
                            <div class="col-md-6 colmd">
                            <label>No</label>
                            <input name="ret_flight_no" id="ret_flight_no" value="<?php echo $voucherInfo->ret_flight_no?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 colmd">
                        <label>PNR No</label>
                        <input name="ret_pnr_no" id="ret_pnr_no" value="<?php echo $voucherInfo->ret_pnr_no?>" class="form-control">
                    </div>
                    <div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<label>Return Date and Time</label>
                            <input name="ret" class="form-control datetimeeidt" id="ret" value="<?php echo date('d/m/Y',strtotime($voucherInfo->ret_date)).' ~ '.date('h:i A',strtotime($voucherInfo->ret_time))?>">
                        </div>
                    </div>
                    <div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<input name="nights" class="form-control" id="nights" value="<?php echo $voucherInfo->nights?>">
                        	<input type="button" class="btn btn-success" name="count_nights" id="count_nights" value="Count Nights">                            
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="panel panel-primary">
            	<div class="panel-heading">
                	Mautamer's Information 
                </div>
                <div class="panel-body">
                	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Select Pax</button>
                	<div class="" id="pax_detail">
                      <?php if($this->session->userdata('client_id')){
						  $this->load->view('voucher/pax_detail_edit');
						  }
					?>
                    
                    </div>
                </div>
                </div>
                <!------end panel body of mautamer's information------->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Transportation
                    </div>
                    <div class="panel-body">
                    <h5>Transport Type</h5>
                    <div class="row" style="padding-left:30px">
                    	<?php foreach($vehicles as $veh){?>
                        	<div class="col-md-2">
                            <span style="padding-right:15px">
                        	<input <?php echo ($voucherInfo->vehicle_id == $veh->id)?'checked="checked"':''?> type="radio" onclick="return get_trip(this.value,<?php echo $voucherInfo->trip_id?>)" name="vehicle" id="vehicle" value="<?php echo $veh->id?>"><?php echo $veh->name?>
                            </span>
                            </div>
                        <?php }?>
                     </div>
                     <h5>Transport Trip</h5>
                     	<div class="row" id="trips" style="font-size: 10px;font-weight: bold;">
                     	
                        </div>
                    </div>
                </div>
                <!-------END TRANSPORTATION------>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Package Detail
                    </div>
                    <div class="panel-body"> 
                    <!----heading--->
                    <div class="row">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<label>Select Packeg</label>
                                <select name="pkg_type" class="form-control" id="pkg_type">
                                	<option value="all">All </option>
                                    <?php foreach($packeg as $pkg){?>
                                    	<option value="<?php echo $pkg->id?>"<?php echo ($voucherInfo->pkg_type == $pkg->id)?'selected="selected"':''?>><?php echo $pkg->name?> </option>
                                    <?php }?>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-2 colmd pull-right">
                        	<div class="form-group">
                            	<label>Group Head Phone No.</label>
                                <input type="text" name="gp_hd_no" id=" gp_hd_no" value="<?php echo $voucherInfo->gp_hd_no?>" class="form-control">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd pull-right">
                        	<div class="form-group">
                            	<label>SR Rate</label>
                                <input type="text" name="sr_rate" id=" sr_rate" value="<?php echo $voucherInfo->sr_rate?>" class="form-control">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd pull-right">
                        	<div class="form-group">
                            	<label>Adult Rate</label>
                                <input type="text" name="adult_rate" id=" adult_rate" value="<?php echo $voucherInfo->adult_rate?>" class="form-control">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd pull-right">
                        	<div class="form-group">
                            	<label>Child Rate</label>
                                <input type="text" name="child_rate" id=" child_rate" value="<?php echo $voucherInfo->child_rate?>" class="form-control">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd pull-right">
                        	<div class="form-group">
                            	<label>Infant Rate</label>
                                <input type="text" name="infant_rate" id=" infant_rate" value="<?php echo $voucherInfo->infant_rate?>" class="form-control">
                        	</div>
                        </div>
                    </div>
                    
                    </div>
                    <div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<label>City</label>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<label>Nights</label>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<label>Check In</label>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<label>Check Out</label>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<label>Hotel Rate</label>
                        	</div>
                        </div>
                        <div class="col-md-3 colmd">
                        	<div class="form-group">
                            	<label>Hotel</label>
                            </div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<label>Room Type</label>
                        	</div>
                        </div>
                     </div>                   
                    <!----end heading---->
                    <?php $counter = 1;$nights=0; foreach($voucher_hotels as $vhotels){?>
                    
                     <!------------start hotels-------->

					<div class="form-group">
                    <div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="city_name[]" id="city_name_<?php echo $counter;?>" class="form-control" onchange="return get_hotel_by_city(this)">
                                	<option value="">Select City</option>
                                    <option value="Makkah" <?php echo ($vhotels->city_name == "Makkah")?'selected="selected"':''?>>Makkah</option>
                                    <option value="Madina" <?php echo ($vhotels->city_name == "Madina")?'selected="selected"':''?>>Madina</option>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="city_night[]" id="city_night_<?php echo $counter;?>" onchange="city_night_cal(this)" class="form-control night_total total_vall" value="<?php echo $vhotels->city_nights;?>">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                          <input type="text" readonly="readonly" style="background:transparent; " name="check_in[]" id="check_in_<?php echo $counter;?>" class="form-control " onchange="nights1()" value="<?php echo date_change_view($vhotels->check_in);?>">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent; " name="check_out[]" id="check_out_<?php echo $counter;?>" class="form-control " onchange="nights1()" value="<?php echo date_change_view($vhotels->check_out);?>">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="htl_rate[]" id="htl_rate_<?php echo $counter;?>" class="form-control " value="<?php echo $vhotels->hotel_amount;?>">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="hotel[]" id="hotel_<?php echo $counter;?>" class="form-control">
                                    <option value="<?php echo $vhotels->hotel_id?>"><?php echo $vhotels->hotel_name?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<?php 
									if(isset($hotelInfo->room_type)){
										$room_type = $hotelInfo->room_type;
									}
									else $room_type = '';
									?>
                                        <select name="room_type[]" id="room_type_<?php echo $counter;?>" class="form-control" onchange="return get_hotel_by_city(this)">
                                        	<!--<option value="">Select Room Type</option>-->
                                            <option value="sharing" <?php echo ($vhotels->room_type == 'sharing')? 'selected="selected"':''?>>Sharing</option>
                                            <option value="single_bed" <?php echo ($vhotels->room_type == 'single_bed')? 'selected="selected"':''?>>Single Bed</option>
                                            <option value="double_bed" <?php echo ($vhotels->room_type == 'double_bed')? 'selected="selected"':''?>>Double Bed</option>
                                            <option value="triple_bed" <?php echo ($vhotels->room_type == 'triple_bed')? 'selected="selected"':''?>>Triple Bed</option>
                                            <option value="quad_bed" <?php echo ($vhotels->room_type == 'quad_bed')? 'selected="selected"':''?>>Quad Bed</option>
                                            <option value="five_bed" <?php echo ($vhotels->room_type == 'five_bed')? 'selected="selected"':''?>>Five Bed</option>
                                            <option value="six_bed" <?php echo ($vhotels->room_type == 'six_bed')? 'selected="selected"':''?>>Six Bed</option>
                                        </select>
                        	</div>
                        </div>
                        <div class="col-md-1">
                                <button type="button" class="btn-danger removeButton"><i class="fa fa-minus"></i></button>
                            </div>
                     </div>
                     </div>
                     <?php $counter++; $nights += $vhotels->city_nights;}?>
                      <!-- The template for adding new field -->
                        <div class="form-group hide" id="bookTemplate">
                        	<div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="city_name[]" id="city_name" class="form-control" onchange="return get_hotel_by_city(this)">
                                	<option value="">Select City</option>
                                    <option value="Makkah">Makkah</option>
                                    <option value="Madina">Madina</option>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="city_night[]" id="city_night" onchange="city_night_cal(this)" class="form-control night_total" value="0">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
	                          <input type="text" readonly="readonly" style="background:transparent; " name="check_in[]" id="check_in" class="form-control " onchange="nights1()">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                       			<input type="text" readonly="readonly" style="background:transparent; " name="check_out[]" id="check_out" class="form-control " onchange="nights1()">
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                       			<input type="text" name="htl_rate[]" id="htl_rate" class="form-control ">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="hotel[]" id="hotel" class="form-control">
                                    <option value="">select</option>
                                    <?php foreach($hotels as $htl){?>
                                    <option value="<?php echo $htl->id?>"><?php echo $htl->name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<?php 
									if(isset($hotelInfo->room_type)){
										$room_type = $hotelInfo->room_type;
									}
									else $room_type = '';
									?>
                                        <select name="room_type[]" id="room_type" class="form-control" onchange="return get_hotel_by_city(this)">
                                        	<!--<option value="">Select Room Type</option>-->
                                            <option value="sharing" <?php echo ($room_type == 'sharing')? 'selected="selected"':''?>>Sharing</option>
                                            <option value="single_bed" <?php echo ($room_type == 'single_bed')? 'selected="selected"':''?>>Single Bed</option>
                                            <option value="double_bed" <?php echo ($room_type == 'double_bed')? 'selected="selected"':''?>>Double Bed</option>
                                            <option value="triple_bed" <?php echo ($room_type == 'triple_bed')? 'selected="selected"':''?>>Triple Bed</option>
                                            <option value="quad_bed" <?php echo ($room_type == 'quad_bed')? 'selected="selected"':''?>>Quad Bed</option>
                                            <option value="five_bed" <?php echo ($room_type == 'five_bed')? 'selected="selected"':''?>>Five Bed</option>
                                            <option value="six_bed" <?php echo ($room_type == 'six_bed')? 'selected="selected"':''?>>Six Bed</option>
                                        </select>
                        	</div>
                        </div>
                        <div class="col-md-1">
                                <button type="button" class="btn-danger removeButton"><i class="fa fa-minus"></i></button>
                            </div>
                     </div>
                        </div>
                     
                     <div class="col-md-2">
                                <button type="button" class="btn btn-success addButton"><i class="fa fa-plus"></i>Add New Hotel</button>
                            </div>










                     <!-------end hotels------->
                     	<div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	Total Nights
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="total_nights" value="<?php echo $nights?>" id="total_nights" class="form-control">
                        	</div>
                        </div>
                        </div>
                        <!-------end row ------>
                    
                <!--</div>  ABI ABI-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Remarks 
                    </div>
                    <div class="panel-body">
                    
                    	<div class="row">
                        	<div class="form-group">
                                <div class="col-md-5">
                                <label>Ziarat</label><br>
                                    <div style="border:1px solid #D0CEC4; margin-top:4px; padding:24px">
                                    <?php foreach($ziarat as $zia){ 
										if($zia->id == 1){
									?>
                                        <input type="checkbox" id="nziarat" name="nziarat" <?php echo ($voucherInfo->nziarat == 1)?'checked="checked"':''?> value="<?php echo $zia->id?>"><?php echo $zia->name; }
										else {?>
                                        <input type="checkbox" class="ziarat_id" id="ziarat_id" name="ziarat_id[]" <?php echo ($zia->ziarat_id != null)?'checked="checked"':''?> value="<?php echo $zia->id?>"><?php echo $zia->name; }?>
                                    <?php }?>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7">
                                <label> Remarks</label><br>
                                    <textarea name="remarks" id="remarks" class="form-control"><?php echo $voucherInfo->remarks?></textarea> 
                                </div>
                            </div>
                        </div>
						<div class="row">
                        	<div class="form-group">
                                <div class="col-md-5">
                                <label style="margin-top:10px">Contact No</label><br>
                                <div style="border:1px solid #D0CEC4; margin-top:4px; padding:24px">
                                    <input type="radio" name="contact" id="package_with_hotel" value="package_with_hotel" <?php echo ($voucherInfo->contact == 'package_with_hotel')?'checked':''?>> Package with Hotel
                                    <input type="radio" name="contact" id="only_transport" value="only_transport" <?php echo ($voucherInfo->contact == 'only_transport')?'checked':''?>> Only Transport
								</div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
            <input type="submit" id="submit" name="submit" class="btn btn-success" value="Submit">
            <a href="<?php echo base_url()?>voucher" class="btn btn-danger">Cancel</a>
            </form>
        </div>    
    </section>
    
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog" style="width:auto">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Add Spouse</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      	<form name="client_form" id="client_form" method="post" action="<?php echo base_url()?>select_clients">
			<table id="example1" class="table table-bordered table-striped">
            	<thead>
                    <tr>
                      <th>Select</th>
                      <th>Name</th>
                      <th>PPNo</th>
                      <th>DOB</th>
                      <th>Age Group</th>
                      <th>Visa No</th>
                      <th>Visa Date</th>
                      <th>Visa Company</th>
                      <th>Account PKG</th>
                      <th>Group Code</th>
                      <th>Group Name</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
					$this->db->select(array('c.id','c.name','c.last_name','c.address','c.last_name','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','a.name agent_name','vc.name as v_name','c.visa_company_id','c.group_code','c.group_name'));
					$this->db->from('client c');		
					$this->db->join('tbl_users a ','a.userId = c.agent_id');
					$this->db->join('visa_company vc','vc.id = c.visa_company_id');
					$this->db->where('c.voucher_issue', 'no');
					$this->db->where('c.visa_approve', 'yes');
					$this->db->where('c.isDeleted', 0);  
					$this->db->where('c.agent_id', $this->session->userdata('voucher_agent'));      
					$query = $this->db->get();        
					$result = $query->result();
					
					$this->db->select(array('c.id','c.name','c.last_name','c.address','c.last_name','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','a.name agent_name','vc.name as v_name','c.visa_company_id','c.group_code','c.group_name'));
					$this->db->from('client c');		
					$this->db->join('tbl_users a ','a.userId = c.agent_id');
					$this->db->join('visa_company vc','vc.id = c.visa_company_id');
					$this->db->where_in('c.id',$this->session->userdata('client_id'));
					//$this->db->where('c.visa_approve', 'yes');
					//$this->db->where('c.isDeleted', 0);  
					//$this->db->where('c.agent_id', $this->session->userdata('voucher_agent'));      
					$query = $this->db->get();        
					$result1 = $query->result();
					 
					foreach($result1 as $record1)
                        {
                    ?>
                    <tr>
                      <td><input type="checkbox" checked="checked" name="id[<?php echo $record1->id?>]" value="<?php echo $record1->id?>"></td>
                      <td><?php echo $record1->name.' '.$record1->last_name ?></td>
                      <td><?php echo $record1->ppno ?></td>
                      <td><?php echo date_change_view($record1->dob) ?></td>
                      <td><?php echo $record1->age_group ?></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>                      
                      <td><?php echo $record1->agent_name ?></td>
                      <td><?php echo $record1->v_name ?></td>
                      <td><?php echo $record1->group_code ?></td>
                      <td><?php echo $record1->group_name ?></td>                                            
                    </tr>
                    <?php
                        }
                    if(!empty($result))
                    {
                        foreach($result as $record)
                        {
                    ?>
                    <tr>
                      <td><input type="checkbox" name="id[<?php echo $record->id?>]" value="<?php echo $record->id?>"></td>
                      <td><?php echo $record->name.' '.$record->last_name ?></td>
                      <td><?php echo $record->ppno ?></td>
                      <td><?php echo date_change_view($record->dob) ?></td>
                      <td><?php echo $record->age_group ?></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>                      
                      <td><?php echo $record->agent_name ?></td>
                      <td><?php echo $record->v_name ?></td>
                      <td><?php echo $record->group_code ?></td>
                      <td><?php echo $record->group_name ?></td>                                            
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                  </table>
                  <input type="button" name="submit2" value="submit" onclick="client_from_submit()" data-dismiss="modal">
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  <script>
		$(function () {
        $("#example1").DataTable({ 
					//"lengthMenu": [[50,10, 25, 50,100,-1], [50 , 10, 25, 50,100,"All"]],
					"bPaginate": false,
					"bInfo": false,
					"ordering": false,
					"order": [[ 0, "desc" ]]
				});
      });  
  </script>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/add_hotel.js" type="text/javascript"></script>

<script>
/*$(document).ready(function(){
   // get_hotel_city1('<?php //echo $voucherInfo->city_name1?>');
	var vehicle_id = '<?php echo $voucherInfo->vehicle_id?>';
	var trip_id = '<?php echo $voucherInfo->trip_id?>';
	get_trip(vehicle_id,trip_id);
	depp();
});
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
function depp(){	
	var datee = $('#dep').val();
	var newdd = datee.split(' ~ ');
	//alert(datee);
	$('#check_in1').val(newdd[0])
	city_night11();
}
Date.prototype.toInputFormat = function() {
   var yyyy = this.getFullYear().toString();
   var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
   var dd  = this.getDate().toString();
   //return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
   return (dd[1]?dd:"0"+dd[0]) + "/"+ (mm[1]?mm:"0"+mm[0])+ "/" + yyyy ;
};
$('#count_nights').click(function (){
	var dep = $('#dep').val();
	var newdep = parseDate(dep);
	var return_ = $('#ret').val();	
	var newreturn_ = parseDate(return_);
	var start = moment(newdep);
	//alert(newdep);
	var end = moment(newreturn_);	
	var days = end.diff(start, "days");	
	$('#nights').val(days);
});
function city_night11(){
var date = new Date(parseDate($("#check_in1").val())),
	days = parseInt($("#city_night1").val(), 10);
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val());
	var nights = $('#nights').val();
	if(total_days > nights){
		alert("You enter Invalid Nights total nights are : "+nights);
		$("#city_night3").val('0');
	}
	else{
		if(!isNaN(date.getTime())){
			date.setDate(date.getDate() + days);
			$("#check_out1").val(date.toInputFormat());
			$("#check_in2").val(date.toInputFormat());
			total();
		} else {
			alert("Invalid Date");  
		}
	}
	city_night21();
	city_night31();
}
function city_night21(){
var date = new Date(parseDate($("#check_in2").val())),
	days = parseInt($("#city_night2").val(), 10);
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val());
	var nights = $('#nights').val();
	if(total_days > nights){
		alert("You enter Invalid Nights total nights are : "+nights);
		$("#city_night3").val('0');
	}
	else{	
		if(!isNaN(date.getTime())){
			date.setDate(date.getDate() + days);
			$("#check_out2").val(date.toInputFormat());
			$("#check_in3").val(date.toInputFormat());
			total();
		} else {
			alert("Invalid Date");  
		}
	}
	//city_night11();
	city_night31();
}

function city_night31(){
var date = new Date(parseDate($("#check_in3").val())),
	days = parseInt($("#city_night3").val(), 10);
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val());
	var nights = $('#nights').val();
	if(total_days > nights){
		alert("You enter Invalid Nights total nights are : "+nights);
		$("#city_night3").val('0');
	}
	else{	
		if(!isNaN(date.getTime())){
			date.setDate(date.getDate() + days);
			$("#check_out3").val(date.toInputFormat());
			total();
		} else {
			alert("Invalid Date");  
		}
	}
	//city_night21();
	//city_night11();
}
function total(){
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val());
	$('#total_nights').val(total_days);
}
		
		
		
		
       

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
	if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var room_type = $('#room_type1').val();
		var pkg_type = $('#pkg_type').val();
		if(city_name == '')
			city_name = 'Makkah';
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel1').html(response);
				}
		});
	}
}
function get_hotel_room1(room_type) {
	if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var city_name = $('#city_name1').val();
		var pkg_type = $('#pkg_type').val();
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel1').html(response);
				}
			});
	}
}
function get_hotel_city2(city_name) {
if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var room_type = $('#room_type2').val();
		var pkg_type = $('#pkg_type').val();
		
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel2').html(response);
				}
		});
	}
}
function get_hotel_room2(room_type) {
if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var city_name = $('#city_name2').val();
		var pkg_type = $('#pkg_type').val();
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel2').html(response);
				}
			});
	}
}
function get_hotel_city3(city_name) {
if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var room_type = $('#room_type3').val();
		var pkg_type = $('#pkg_type').val();
		
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel3').html(response);
				}
		});
	}
}
function get_hotel_room3(room_type) {
if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var city_name = $('#city_name3').val();
		var pkg_type = $('#pkg_type').val();
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel3').html(response);
				}
			});
	}
}

function get_trip(vehicle_id,trip_id) {//alert('adf ');
var trip_id = '<?php echo $voucherInfo->trip_id?>';

	$.ajax({
		url: '<?php echo base_url();?>selectTrip1/'+ vehicle_id+'/'+trip_id,
		success: function(response)
		{
			jQuery('#trips').html(response);
		}
	});
}

function client_from_submit() {	
	$.ajax({
		type:'POST',
		data : $('#client_form').serialize(),
		url: '<?php echo base_url();?>select_clients/',
		success: function(response)
		{
			jQuery('#pax_detail').html(response);
		}
	});
}
$('#pkg_type').change(function (){
	$('#city_name1').val('');
	$('#city_name2').val('');
	$('#city_name3').val('');
});

function changeCity(){	
	
	var sector = $('#sector2').val();
	//alert(sector);
	if(sector == 'JED'){
		$("#city_name1").val("Makkah").change();
		$("#city_name2").val("Madina").change();
	}
	if(sector == 'MED'){
		$("#city_name1").val("Madina").change();
		$("#city_name2").val("Makkah").change();
	}
}
function changeCityR(){	
	
	var sector = $('#ret_sector').val();
	//alert(sector);
	if(sector == 'JED'){
		$("#city_name3").val("Makkah").change();
	}
	if(sector == 'MED'){
		$("#city_name3").val("Madina").change();
	}
}*/

$(document).ready(function(){
    var iid = $('#vehicle').val();
	get_trip(iid,27);
	changeCity();
});
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
/*$('#dep').on('change' function(){ //alert('asdf');console.log('sadf');
	var datee = $('#dep').val();
	var newdd = datee.split(' ~ ');
	alert(newdd[0]);
	$('#check_in_1').val(newdd[0])
});*/
function depp(){	
	var datee = $('#dep').val();
	var newdd = datee.split(' ~ ');
	//alert(datee);
	$('#check_in_1').val(newdd[0]);
	//city_night_cal(document.getElementById('city_night_1'));
	$(".total_vall").each(function(index, element) {
		//alert(element);
		//city_night_cal(element);
		$(element).val('0');
	});
}
Date.prototype.toInputFormat = function() {
   var yyyy = this.getFullYear().toString();
   var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
   var dd  = this.getDate().toString();
   //return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
   return (dd[1]?dd:"0"+dd[0]) + "/"+ (mm[1]?mm:"0"+mm[0])+ "/" + yyyy ;
};

		
		
		
		
       
$('#count_nights').click(function (){
	var dep = $('#dep').val();
	var newdep = parseDate(dep);
	var return_ = $('#ret').val();	
	var newreturn_ = parseDate(return_);
	var start = moment(newdep);
	//alert(start);
	var end = moment(newreturn_);	
	var days = end.diff(start, "days");	
	$('#nights').val(days);
});

function get_trip(vehicle_id,trip_id) {//alert('adf ');
//var trip_id = 27;
	$.ajax({
		url: '<?php echo base_url();?>selectTrip1/'+ vehicle_id+'/'+trip_id,
		success: function(response)
		{
			jQuery('#trips').html(response);
		}
	});
}

function client_from_submit() {	
	$.ajax({
		type:'POST',
		data : $('#client_form').serialize(),
		url: '<?php echo base_url();?>select_clients/',
		success: function(response)
		{
			jQuery('#pax_detail').html(response);
		}
	});
}
function selectAgent() {	
var agent_id = $('#agent_id').val();
	$.ajax({
		//type:'POST',
		//data : $('#client_form').serialize(),
		url: '<?php echo base_url();?>selectAgent/'+agent_id,
		success: function(response)
		{
			window.location.reload();
		}
	});
}
$('#pkg_type').change(function (){
	$('#city_name1').val('');
	$('#city_name2').val('');
	$('#city_name3').val('');
});
function changeCity(){	
	
	var sector = $('#sector2').val();
	var vehicle = $('#vehicle').val();
	var rsector = $('#ret_sector').val();
		
	if(sector == 'JED' && rsector == 'JED'){
		if(vehicle == 1){
			var trip_id = '27';
			get_trip(vehicle,trip_id)
		}
	}
	else if(sector == 'JED' && rsector == 'MED'){
		if(vehicle == 1){
			var trip_id = '13';
			get_trip(vehicle,trip_id)
		}
	}
	else if(sector == 'MED' && rsector == 'MED'){
		if(vehicle == 1){
			var trip_id = '12';
			get_trip(vehicle,trip_id)
		}
	}
	else {
		if(vehicle == 1){
			var trip_id = '11';
			get_trip(vehicle,trip_id)
		}
	}
	
		
}

var invIndex = <?php echo --$counter;?>;
$('#voucher')
        .on('click', '.addButton', function() {
            invIndex++;
            var $template = $('#bookTemplate'),
                $clone    = $template
                                .clone(true)
                                .removeClass('hide')
                                .removeAttr('id')
                                .attr('data-book-index', invIndex)
                                .insertBefore($template);
            $clone
				.find('[id="hotel"]').attr('id', 'hotel_'+invIndex).end()
                .find('[id="city_name"]').attr('id', 'city_name_'+invIndex).end()
                .find('[id="city_night"]').attr('id', 'city_night_' + invIndex).end()
				.find('[id="check_in"]').attr('id', 'check_in_' + invIndex).end()
				.find('[id="check_out"]').attr('id', 'check_out_' + invIndex).end()
				.find('[id="htl_rate"]').attr('id', 'htl_rate_' + invIndex).end()
				.find('[id="room_type"]').attr('id', 'room_type_' + invIndex).end()

            // Add new fields
            // Note that we also pass the validator rules for new field as the third parameter
          
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row  = $(this).parents('.form-group'),
            index = $row.attr('data-book-index');
			$row.remove();
			//ajaxSearch();
           
        });
		
		
function get_hotel_by_city(obj) {
		  var get_id = obj.id.split('_');
		  var id = get_id[get_id.length-1];
	if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var city_name = $('#city_name_'+id).val();
		var room_type = $('#room_type_'+id).val();
		var pkg_type = $('#pkg_type').val();
		
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel_'+id).html(response);
				}
		});
	}
}

function city_night_cal(obj){
	var get_id = obj.id.split('_');
	var id = get_id[get_id.length-1];
	//alert(id);
	if(id == '1'){
		var date = new Date(parseDate($("#check_in_"+id).val()));
	}
	else{
		var idd = id;
		idd = --idd;
		var date = new Date(parseDate($("#check_out_"+idd).val()));
	}
	days = parseInt($("#city_night_"+id).val(), 10);
	var total_days = total();
	var nights = $('#nights').val();
	if(total_days > nights){
		alert("You enter Invalid Nights total nights are : "+nights);
		$("#city_night_"+id).val('0');
	}
	else{
		if(!isNaN(date.getTime())){
			date.setDate(date.getDate() + days);
			if(id == 1){
				$("#check_out_"+id).val(date.toInputFormat());
			}
			else{
				var iddd = id;
				iddd = --iddd;
				$("#check_in_"+id).val($("#check_out_"+iddd).val());
				$("#check_out_"+id).val(date.toInputFormat());
			}
			total();
		} else {
			alert("Invalid Date");  
		}
	}
}
function total(){
	var total_nights = 0;
	$(".night_total").each(function(index, element) {
		 if($.isNumeric($(element).val()))
		 {			 
			 total_nights += parseFloat($(element).val());
		 }
	});
	$("#total_nights").val(total_nights)
	return total_nights;
}
$('.ziarat_id').click( function(){
	if($('.ziarat_id').is(":checked")){
		$('#nziarat').prop('checked', false);
	}
	else{
		$('#nziarat').prop('checked', true);
	}
});
$('#nziarat').click( function(){
	if($('.ziarat_id').is(":checked")){
		$('#nziarat').prop('checked', false);
	}
	else{
		$('#nziarat').prop('checked', true);
	}
});

	
</script>