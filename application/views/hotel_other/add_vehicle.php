<?php 
if(isset($vehicleInfo)){
	if($vehicleInfo->id){
		$url = 'edit_vehicle';
	}
	else{
		$url = 'addVehicle';
	}
}
else $url = 'addVehicle';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-car"></i> Vehicle Management
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
                        <h3 class="box-title">Enter Vehicle Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="add_vehicle" action="<?php echo base_url().$url?>" method="post" role="form">
                    <?php if(isset($vehicleInfo)){?>
						<input type="hidden" name="id" value="<?php echo $vehicleInfo->id?>">
					<?php }?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Vehicle Name</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($vehicleInfo->name))?$vehicleInfo->name:''?>" id="name" name="name" maxlength="128">
                                    </div>                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Sharing</label>
                                        <?php 
										if(isset($vehicleInfo->sharing)){
											$sharing = $vehicleInfo->sharing;
										}else{
											$sharing = '';
											}
										?>
                                        <select name="sharing" id="sharing" class="form-control">
                                        	<option value="">Select Type</option>
                                            <option value="yes" <?php echo ($sharing == 'yes')?'selected = "selected"':''?>>Yes</option>
                                            <option value="no" <?php echo ($sharing == 'no')?'selected = "selected"':''?>>No</option>
                                        </select>
                                    </div>                                    
                                </div>
                                
                            </div>
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <a href="<?php echo base_url()?>vehicle" class="btn btn-danger">Cancel</a>
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