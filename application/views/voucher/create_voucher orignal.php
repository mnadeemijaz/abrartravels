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
//echo 'asfdsasfd';
//echo $this->session->userdata('voucher_agent');
//die();
?>
<?php //echo $this->session->userdata('voucher_agent');
if($this->session->userdata('role') == 3){ 
	$this->session->set_userdata('voucher_agent',$this->session->userdata('userId'));}
if($this->session->userdata('voucher_agent')){
	?>
<div class="content-wrapper" style="padding:5px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file"></i> Create Voucher
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
                        	<label>Departure Date and Time</label>
                            <input name="dep" class="form-control datetime" id="dep" >
                        </div>
                    </div>
                    <div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<label>Arival Date and Time</label>
                            <input name="arv" class="form-control datetime" id="arv">
                        </div>
                    </div>
                    <div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<div class="col-md-6 colmd">
                        	<label>Sector</label>
                            <select name="sector" class="form-control" id="sector">
                            	<option value="">select</option>
                            	<?php foreach($sectors as $sec){?>
                                <option value="<?php echo $sec->id?>"><?php echo $sec->name?></option>
                                <?php }?>
                            </select> - </div>
                            <div class="col-md-6 colmd">
                            <label>To</label>
                            <select name="sector2" class="form-control" id="sector2" onchange="changeCity()">
                            	<option value="JED">JED</option>
                                <option value="MED">MED</option>
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
                                <option value="<?php echo $flt->id?>"><?php echo $flt->name?></option>
                                <?php }?>
                            </select></div>
                            <div class="col-md-6 colmd">
                            <label>No</label>
                            <input name="dep_flight_no" id="dep_flight_no" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 colmd">
                        <label>PNR No</label>
                        <input name="dep_pnr_no" value="" id="dep_pnr_no" class="form-control">
                    </div>
                </div>
                <h4>Return</h4>
                <div class="row">
                	<div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<div class="col-md-6 colmd">
                        	<label>Sector</label>
                            <select name="ret_sector" id="ret_sector" class="form-control" onchange="changeCityR()">
                            	<option value="MED">MED</option>
                                <option value="JED">JED</option>
                            </select> - </div>
                            <div class="col-md-6 colmd">
                            <label>To</label>
                            <select name="ret_sector2" id="ret_sector2" class="form-control">
                            	<option value="">select</option>
                                <?php foreach($sectors as $sec){?>
                                <option value="<?php echo $sec->id?>"><?php echo $sec->name?></option>
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
                                <option value="<?php echo $flt->id?>"><?php echo $flt->name?></option>
                                <?php }?>
                            </select></div>
                            <div class="col-md-6 colmd">
                            <label>No</label>
                            <input name="ret_flight_no" id="ret_flight_no" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 colmd">
                        <label>PNR No</label>
                        <input name="ret_pnr_no" id="ret_pnr_no" value="" class="form-control">
                    </div>
                    <div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<label>Return Date and Time</label>
                            <input name="ret" class="form-control datetime" id="ret">
                        </div>
                    </div>
                    <div class="col-md-3 colmd">
                    	<div class="form-group">
                        	<input name="nights" class="form-control" id="nights" value="<?php echo $this->input->post('nights')?>">
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
						  $this->load->view('voucher/pax_detail');
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
                        	<span style="padding-right:15px">
                        	<input type="radio" onclick="return get_trip(this.value,27)" name="vehicle" id="vehicle" value="<?php echo $veh->id?>" <?php echo ($veh->id == '1')? 'checked="checked"':''?>><?php echo $veh->name?>
                            </span>
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
                                    	<option value="<?php echo $pkg->id?>"><?php echo $pkg->name?> </option>
                                    <?php }?>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-2 colmd pull-right">
                        	<div class="form-group">
                            	<label>Group Head Phone No.</label>
                                <input type="text" name="gp_hd_no" id=" gp_hd_no" class="form-control">
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
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<label>Check In</label>
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<label>Check Out</label>
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
                    <div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="city_name1" id="city_name1" class="form-control" onchange="return get_hotel_city1(this.value,'')">
                                	<option value="">Select City</option>
                                    <option value="Makkah">Makkah</option>
                                    <option value="Madina">Madina</option>
                                    <option value="Itkaf">Itkaf</option>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="city_night1" id="city_night1" onchange="city_night11()" class="form-control" value="0">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent; " name="check_in1" id="check_in1" class="form-control " onchange="nights1()">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent; " name="check_out1" id="check_out1" class="form-control " onchange="nights1()">
                        	</div>
                        </div>
                        <div class="col-md-3 colmd">
                        	<div class="form-group">
                            	<select name="hotel1" id="hotel1" class="form-control">
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
                                        <select name="room_type1" id="room_type1" class="form-control" onchange="return get_hotel_room1(this.value,'')">
                                        	<!--<option value="">Select Room Type</option>-->
                                            <option value="sharing" <?php echo ($room_type == 'sharing')? 'selected="selected"':''?>>Sharing</option>
                                            <option value="single_bed" <?php echo ($room_type == 'single_bed')? 'selected="selected"':''?>>Single Bed</option>
                                            <option value="double_bed" <?php echo ($room_type == 'double_bed')? 'selected="selected"':''?>>Double Bed</option>
                                            <option value="triple_bed" <?php echo ($room_type == 'triple_bed')? 'selected="selected"':''?>>Triple Bed</option>
                                            <option value="quad_bed" <?php echo ($room_type == 'quad_bed')? 'selected="selected"':''?>>Quad Bed</option>
                                        </select>
                        	</div>
                        </div>
                     </div>
                     <!------------end 1st row-------->
                     <!---------2nd row------->
                     <div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="city_name2" id="city_name2" class="form-control" onchange="return get_hotel_city2(this.value,'')">
                                	<option value="">Select City</option>
                                    <option value="Makkah">Makkah</option>
                                    <option value="Madina">Madina</option>
                                    <option value="Itkaf">Itkaf</option>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="city_night2" id="city_night2" onchange="city_night21()" class="form-control" value="0">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent; " name="check_in2" id="check_in2" class="form-control " onchange="nights2()">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent;" name="check_out2" id="check_out2" class="form-control " onchange="nights2()">
                        	</div>
                        </div>
                        <div class="col-md-3 colmd">
                        	<div class="form-group">
                            	<select name="hotel2" id="hotel2" class="form-control">
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
                                        <select name="room_type2" id="room_type2" class="form-control" onchange="return get_hotel_room2(this.value,'')">
                                        	<!--<option value="">Select Room Type</option>-->
                                            <option value="sharing" <?php echo ($room_type == 'sharing')? 'selected="selected"':''?>>Sharing</option>
                                            <option value="single_bed" <?php echo ($room_type == 'single_bed')? 'selected="selected"':''?>>Single Bed</option>
                                            <option value="double_bed" <?php echo ($room_type == 'double_bed')? 'selected="selected"':''?>>Double Bed</option>
                                            <option value="triple_bed" <?php echo ($room_type == 'triple_bed')? 'selected="selected"':''?>>Triple Bed</option>
                                            <option value="quad_bed" <?php echo ($room_type == 'quad_bed')? 'selected="selected"':''?>>Quad Bed</option>
                                        </select>
                        	</div>
                        </div>
                     </div>
                     <!--------end 2nd row------->
                     <!----------3rd row------->
                     <div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="city_name3" id="city_name3" class="form-control" onchange="return get_hotel_city3(this.value,'')">
                                	<option value="">Select City</option>
                                    <option value="Makkah">Makkah</option>
                                    <option value="Madina">Madina</option>
                                    <option value="Itkaf">Itkaf</option>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="city_night3" id="city_night3" onchange="city_night31()" class="form-control" value="0">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent; " name="check_in3" id="check_in3" class="form-control " onchange="nights3()">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent;" name="check_out3" id="check_out3" class="form-control " onchange="nights3()">
                        	</div>
                        </div>
                        <div class="col-md-3 colmd">
                        	<div class="form-group">
                            	<select name="hotel3" id="hotel3" class="form-control">
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
                                        <select name="room_type3" id="room_type3" class="form-control" onchange="return get_hotel_room3(this.value,'')">
                                        	<!--<option value="">Select Room Type</option>-->
                                            <option value="sharing" <?php echo ($room_type == 'sharing')? 'selected="selected"':''?>>Sharing</option>
                                            <option value="single_bed" <?php echo ($room_type == 'single_bed')? 'selected="selected"':''?>>Single Bed</option>
                                            <option value="double_bed" <?php echo ($room_type == 'double_bed')? 'selected="selected"':''?>>Double Bed</option>
                                            <option value="triple_bed" <?php echo ($room_type == 'triple_bed')? 'selected="selected"':''?>>Triple Bed</option>
                                            <option value="quad_bed" <?php echo ($room_type == 'quad_bed')? 'selected="selected"':''?>>Quad Bed</option>
                                        </select>
                        	</div>
                        </div>
                     </div>
                     <!-------end 3rd row------->
                     <!-------4th row------>
                     <div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="city_name4" id="city_name4" class="form-control" onchange="return get_hotel_city4(this.value,'')">
                                	<option value="">Select City</option>
                                    <option value="Makkah">Makkah</option>
                                    <option value="Madina">Madina</option>
                                    <option value="Itkaf">Itkaf</option>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="city_night4" id="city_night4" onchange="city_night41()" class="form-control" value="0">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent; " name="check_in4" id="check_in4" class="form-control " onchange="nights4()">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent;" name="check_out4" id="check_out4" class="form-control " onchange="nights4()">
                        	</div>
                        </div>
                        <div class="col-md-3 colmd">
                        	<div class="form-group">
                            	<select name="hotel4" id="hotel4" class="form-control">
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
                                        <select name="room_type5" id="room_type4" class="form-control" onchange="return get_hotel_room4(this.value,'')">
                                        	<!--<option value="">Select Room Type</option>-->
                                            <option value="sharing" <?php echo ($room_type == 'sharing')? 'selected="selected"':''?>>Sharing</option>
                                            <option value="single_bed" <?php echo ($room_type == 'single_bed')? 'selected="selected"':''?>>Single Bed</option>
                                            <option value="double_bed" <?php echo ($room_type == 'double_bed')? 'selected="selected"':''?>>Double Bed</option>
                                            <option value="triple_bed" <?php echo ($room_type == 'triple_bed')? 'selected="selected"':''?>>Triple Bed</option>
                                            <option value="quad_bed" <?php echo ($room_type == 'quad_bed')? 'selected="selected"':''?>>Quad Bed</option>
                                        </select>
                        	</div>
                        </div>
                     </div>
                     <!-------end 4th row------->
                     <!-------4th row------>
                     <div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	<select name="city_name5" id="city_name5" class="form-control" onchange="return get_hotel_city5(this.value,'')">
                                	<option value="">Select City</option>
                                    <option value="Makkah">Makkah</option>
                                    <option value="Madina">Madina</option>
                                    <option value="Itkaf">Itkaf</option>
                                </select>
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="city_night5" id="city_night5" onchange="city_night51()" class="form-control" value="0">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent; " name="check_in5" id="check_in5" class="form-control " onchange="nights5()">
                        	</div>
                        </div>
                        <div class="col-md-2 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" readonly="readonly" style="background:transparent;" name="check_out5" id="check_out5" class="form-control " onchange="nights5()">
                        	</div>
                        </div>
                        <div class="col-md-3 colmd">
                        	<div class="form-group">
                            	<select name="hotel5" id="hotel5" class="form-control">
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
                                        <select name="room_type5" id="room_type5" class="form-control" onchange="return get_hotel_room5(this.value,'')">
                                        	<!--<option value="">Select Room Type</option>-->
                                            <option value="sharing" <?php echo ($room_type == 'sharing')? 'selected="selected"':''?>>Sharing</option>
                                            <option value="single_bed" <?php echo ($room_type == 'single_bed')? 'selected="selected"':''?>>Single Bed</option>
                                            <option value="double_bed" <?php echo ($room_type == 'double_bed')? 'selected="selected"':''?>>Double Bed</option>
                                            <option value="triple_bed" <?php echo ($room_type == 'triple_bed')? 'selected="selected"':''?>>Triple Bed</option>
                                            <option value="quad_bed" <?php echo ($room_type == 'quad_bed')? 'selected="selected"':''?>>Quad Bed</option>
                                        </select>
                        	</div>
                        </div>
                     </div>
                     <!-------end 4th row------->
                     	<div class="row" style="padding-left:20px; padding-right:20px">
                    	<div class="col-md-2 colmd">
                        	<div class="form-group">
                            	Total Nights
                        	</div>
                        </div>
                        <div class="col-md-1 colmd">
                        	<div class="form-group">                            	
                            	<input type="text" name="total_nights" id="total_nights" class="form-control">
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
                                    <?php foreach($ziarat as $zia){ ?>
                                        <input type="radio" id="ziarat_id" name="ziarat_id" <?php echo ($zia->id == 1)?'checked="checked"':''?> value="<?php echo $zia->id?>"><?php echo $zia->name?>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7">
                                <label> Remarks</label><br>
                                    <textarea name="remarks" id="remarks" class="form-control"></textarea> 
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
            <input type="submit" name="submit" class="btn btn-success" value="Submit">
            <a href="<?php echo base_url()?>voucher" class="btn btn-danger">Cancel</a>
            </form>
        </div>    
    </section>
    
</div>
<?php }
else{ ?>
<div class="content-wrapper" style="padding:5px">
    <section class="content-header">
      <h1>
      	<i class="fa fa-file"></i> Select Agent For Voucher
      </h1>
    </section>    
    <section class="content">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3 colmd">
                <label>Select Agent</label>
                <select name="agent_id" class="form-control" id="agent_id" onchange="selectAgent()">
                    <option value="">Select Agent Here</option>
                    <?php foreach($agent as $ag){?>
                        <option value="<?php echo $ag->userId?>"><?php echo $ag->name?></option>
                    <?php }?>
                </select>
                </div>
            </div>
        </div>
    </section>
</div>
<?php }
?>

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
			<table class="table table-hover">
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
                    <?php 
					$this->db->select(array('c.id','c.name','c.address','c.last_name','c.passport_issue_date','c.passport_exp_date','c.dob','c.ppno','c.age_group','c.visa_id','c.agent_id','c.account_pkg','c.iata','a.name agent_name','vc.name as v_name','c.visa_company_id','c.group_code','c.group_name'));
					$this->db->from('client c');		
					$this->db->join('tbl_users a ','a.userId = c.agent_id');
					$this->db->join('visa_company vc','vc.id = c.visa_company_id');
					$this->db->where('c.voucher_issue', 'no');
					$this->db->where('c.isDeleted', 0);        
					$query = $this->db->get();        
					$result = $query->result(); 
                    if(!empty($result))
                    {
                        foreach($result as $record)
                        {
                    ?>
                    <tr>
                      <td><input type="checkbox" name="id[<?php echo $record->id?>]" value="<?php echo $record->id?>"></td>
                      <td><?php echo $record->name ?></td>
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
                  </table>
                  <input type="button" name="submit2" value="submit" onclick="client_from_submit()" data-dismiss="modal">
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/add_hotel.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
    get_hotel_city1('Makkah');
	var iid = $('#vehicle').val();
	get_trip(iid,27);
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
$('#dep').change(function(){
	var datee = $('#dep').val();
	var newdd = datee.split(' ~ ');
	$('#check_in1').val(newdd[0])
});
Date.prototype.toInputFormat = function() {
   var yyyy = this.getFullYear().toString();
   var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
   var dd  = this.getDate().toString();
   //return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
   return (dd[1]?dd:"0"+dd[0]) + "/"+ (mm[1]?mm:"0"+mm[0])+ "/" + yyyy ;
};
function city_night11(){
var date = new Date(parseDate($("#check_in1").val())),
	days = parseInt($("#city_night1").val(), 10);
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val())+parseInt($("#city_night4").val())+parseInt($("#city_night5").val());
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
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val())+parseInt($("#city_night4").val())+parseInt($("#city_night5").val());
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
	city_night31();
}

function city_night31(){
var date = new Date(parseDate($("#check_in3").val())),
	days = parseInt($("#city_night3").val(), 10);
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val())+parseInt($("#city_night4").val())+parseInt($("#city_night5").val());
	var nights = $('#nights').val();
	if(total_days > nights){
		alert("You enter Invalid Nights total nights are : "+nights);
		$("#city_night3").val('0');
	}
	else{
		if(!isNaN(date.getTime())){
			date.setDate(date.getDate() + days);
			$("#check_out3").val(date.toInputFormat());
			$("#check_in4").val(date.toInputFormat());
			total();
		} else {
			alert("Invalid Date");  
		}
	}
}
function city_night41(){
var date = new Date(parseDate($("#check_in4").val())),
	days = parseInt($("#city_night4").val(), 10);
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val())+parseInt($("#city_night4").val())+parseInt($("#city_night5").val());
	var nights = $('#nights').val();
	if(total_days > nights){
		alert("You enter Invalid Nights total nights are : "+nights);
		$("#city_night4").val('0');
	}
	else{
		if(!isNaN(date.getTime())){
			date.setDate(date.getDate() + days);
			$("#check_out4").val(date.toInputFormat());
			$("#check_in5").val(date.toInputFormat());
			total();
		} else {
			alert("Invalid Date");  
		}
	}
}
function city_night51(){
var date = new Date(parseDate($("#check_in5").val())),
	days = parseInt($("#city_night5").val(), 10);
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val())+parseInt($("#city_night4").val())+parseInt($("#city_night5").val());
	var nights = $('#nights').val();
	if(total_days > nights){
		alert("You enter Invalid Nights total nights are : "+nights);
		$("#city_night5").val('0');
	}
	else{
		if(!isNaN(date.getTime())){
			date.setDate(date.getDate() + days);
			$("#check_out5").val(date.toInputFormat());
			total();
		} else {
			alert("Invalid Date");  
		}
	}
}
function total(){
	var total_days = parseInt($("#city_night1").val())+parseInt($("#city_night2").val())+parseInt($("#city_night3").val())+parseInt($("#city_night4").val())+parseInt($("#city_night5").val());
	$('#total_nights').val(total_days);
}
		
		
		
		
       
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
function nights4(){
	var check_in4 = $('#check_in4').val();
	var check_out4 = $('#check_out4').val();
	var newcheckin4 = parseDate(check_in4);
	var newcheckout4 = parseDate(check_out4);
	var start = moment(newcheckin4);
	var end = moment(newcheckout4);	
	var days = end.diff(start, "days");	
	$('#city_night4').val(days);
}
function nights5(){
	var check_in5 = $('#check_in5').val();
	var check_out5 = $('#check_out5').val();
	var newcheckin5 = parseDate(check_in5);
	var newcheckout5 = parseDate(check_out5);
	var start = moment(newcheckin5);
	var end = moment(newcheckout5);	
	var days = end.diff(start, "days");	
	$('#city_night5').val(days);
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

function get_hotel_city4(city_name) {
if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var room_type = $('#room_type4').val();
		var pkg_type = $('#pkg_type').val();
		
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel4').html(response);
				}
		});
	}
}
function get_hotel_room4(room_type) {
if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var city_name = $('#city_name4').val();
		var pkg_type = $('#pkg_type').val();
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel4').html(response);
				}
			});
	}
}

function get_hotel_city5(city_name) {
if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var room_type = $('#room_type5').val();
		var pkg_type = $('#pkg_type').val();
		
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel5').html(response);
				}
		});
	}
}
function get_hotel_room4(room_type) {
if($('#pkg_type').val() == ''){
		alert('Please Select Packeg Type First');
	}
	else{
		var city_name = $('#city_name5').val();
		var pkg_type = $('#pkg_type').val();
			$.ajax({
				url: '<?php echo base_url();?>selectHtl_city/'+ city_name+'/'+room_type+'/'+pkg_type,
				success: function(response)
				{
					jQuery('#hotel5').html(response);
				}
			});
	}
}
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
	
	//alert(sector);
	if(sector == 'JED'){
		
		$("#city_name1").val("Makkah").change();
		$("#city_name2").val("Madina").change();
	}
	if(sector == 'MED'){
		
		$("#city_name1").val("Madina").change();
		$("#city_name2").val("Makkah").change();
	}
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
function changeCityR(){	
	var sector = $('#sector2').val();
	var rsector = $('#ret_sector').val();
	//alert(sector);
	if(rsector == 'JED'){
		$("#city_name3").val("Makkah").change();
	}
	if(rsector == 'MED'){
		$("#city_name3").val("Madina").change();
	}
	
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

//alert(datediff(parseDate(first.value), parseDate(second.value)));
</script>