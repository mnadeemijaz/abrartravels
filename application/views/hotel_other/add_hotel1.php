<?php 
if(isset($hotelInfo)){
	if($hotelInfo->id){
		$url = 'editHotel';
	}
	else{
		$url = 'add_hotel';
	}
}
else $url = 'add_hotel';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Hotel Management
        <small>Add / Edit Hotels</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Hotel Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="add_hotel" action="<?php echo base_url().$url?>" method="post" role="form">
                    <?php if(isset($hotelInfo)){?>
						<input type="hidden" name="id" value="<?php echo $hotelInfo->id?>">
					<?php }?>
                        <div class="box-body">
                            <!--<div class="row">-->
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Hotel Name</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($hotelInfo->name))?$hotelInfo->name:''?>" id="name" name="name" maxlength="128">
                                    </div>
                                    
                                </div>
                                <!--<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Hotel address</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($hotelInfo->address))?$hotelInfo->address:''?>" id="address"  name="address" maxlength="128">
                                    </div>
                                </div>-->
                            <!--</div>
                            <div class="row">-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <?php 
									if(isset($hotelInfo->room_type)){
										$room_type = $hotelInfo->room_type;
									}
									else $room_type = '';
									?>
                                        <label for="password">Room Type</label>
                                        <select name="room_type" id="room_type" class="form-control">
                                        	<option value="">Select Room Type</option>
                                            <option value="sharing" <?php echo ($room_type == 'sharing')? 'selected="selected"':''?>>Sharing</option>
                                            <option value="single_bed" <?php echo ($room_type == 'single_bed')? 'selected="selected"':''?>>Single Bed</option>
                                            <option value="double_bed" <?php echo ($room_type == 'double_bed')? 'selected="selected"':''?>>Double Bed</option>
                                            <option value="triple_bed" <?php echo ($room_type == 'triple_bed')? 'selected="selected"':''?>>Triple Bed</option>
                                            <option value="quad_bed" <?php echo ($room_type == 'quad_bed')? 'selected="selected"':''?>>Quad Bed</option>
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Rate (SR)</label>
                                        <?php if(isset($hotelInfo->room_amount)){
											if($hotelInfo->room_type == 'sharing')
											$amount = $hotelInfo->room_amount;
											else if($hotelInfo->room_type == 'single_bed')
											$amount = $hotelInfo->room_amount;
											else if($hotelInfo->room_type == 'double_bed')
											$amount = $hotelInfo->room_amount*2;
											else if($hotelInfo->room_type == 'triple_bed')
											$amount = $hotelInfo->room_amount*3;
											else if($hotelInfo->room_type == 'quad_bed')
											$amount = $hotelInfo->room_amount*4;
											
										}?>
                                        <input type="text" class="form-control required digits" value="<?php echo (isset($hotelInfo->room_amount))?round($amount):''?>" id="rate" name="rate" maxlength="10">
                                    </div>
                                </div>-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <?php 
									if(isset($hotelInfo->city_name)){
										$city_name = $hotelInfo->city_name;
									}
									else $city_name = '';
									?>
                                        <label for="mobile">City Name</label>
                                        <select name="city_name" id="city_name" class="form-control">
                                        	<option value=""> Select City</option>
                                            <option value="Makkah" <?php echo ($city_name == 'Makkah')? 'selected="selected"':''?>>Makkah</option>
                                            <option value="Madina" <?php echo ($city_name == 'Madina')? 'selected="selected"':''?>>Madinah</option>
                                            <option value="Itkaf" <?php echo ($city_name == 'Itkaf')? 'selected="selected"':''?>>Itkaf</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <?php 
									if(isset($hotelInfo->pkg_type)){
										$pkg_type = $hotelInfo->pkg_type;
									}
									else $pkg_type = '';
									?>
                                        <label for="mobile">Packeg Name</label>
                                        <select name="pkg_type" id="pkg_type" class="form-control">
                                        	<option value=""> Select Packeg</option>
                                            <?php foreach($packeg as $row){?>
                                            <option value="<?php echo $row->id?>" <?php echo ($row->id == $pkg_type)?'Selected="Selected"':''?>><?php echo $row->name?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="col-md-6">
                                    <div class="form-group">
                                    <?php 
									if(isset($hotelInfo->agent_id)){
										$agent_id = $hotelInfo->agent_id;
									}
									else $agent_id = '';
									?>
                                        <label for="mobile">Agent Name</label>
                                        <select name="agent_id" id="agent_id" class="form-control">
                                        	<option value=""> Select Agent</option>
                                            <?php foreach($agentList as $row){?>
                                            <option value="<?php echo $row->userId?>" <?php echo ($row->userId == $agent_id)?'Selected="Selected"':''?>><?php echo $row->name?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>-->
                                                                  
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <a href="<?php echo base_url()?>hotel" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/add_hotel.js" type="text/javascript"></script>