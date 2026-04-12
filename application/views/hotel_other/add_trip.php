<?php 
if(isset($tripInfo)){
	if($tripInfo->id){
		$url = 'edit_trip';
	}
	else{
		$url = 'addTrip';
	}
}
else $url = 'addTrip';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-rocket"></i> Trip Management
        <small>Add / Edit Vehicle</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Trip Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="add_trip" action="<?php echo base_url().$url?>" method="post" role="form">
                    <?php if(isset($tripInfo)){?>
						<input type="hidden" name="id" value="<?php echo $tripInfo->id?>">
					<?php }?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Name:</label>
                                        <?php echo $tripInfo->name;?>
                                        <!--<input type="text" class="form-control required" value="<?php echo (isset($tripInfo->name))?$tripInfo->name:''?>" id="name" name="name" maxlength="128">-->
                                    </div>                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Vehicle Name : </label>
                                        
                                        <?php  foreach($vehicle_data as $row){
                                        echo ($tripInfo->vehicle_id == $row->id)?$row->name:'';}
										/*	if(isset($tripInfo->vehicle_id)){
												$vehicle_id = $tripInfo->vehicle_id;
											}
											else $vehicle_id = '';*/
										?>
                                       <!--- <select name="vehicle_id" class="form-control">
                                        	<option value="">Select Vehicle Name</option>
                                            <?php foreach($vehicle_data as $row){?>
                                            	<option value="<?php echo $row->id?>"<?php echo ($vehicle_id == $row->id)?'selected="selected"':''?>><?php echo $row->name?></option>
                                            <?php }?>
                                        </select>-->
                                    </div>                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Price</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($tripInfo->price))?$tripInfo->price:''?>" id="price" name="price" maxlength="128">
                                    </div>                                    
                                </div>
                                
                            </div>
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <a href="<?php echo base_url()?>trip" class="btn btn-danger">Cancel</a>
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