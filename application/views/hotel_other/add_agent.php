<?php 
if(isset($agentInfo)){
	if($agentInfo->id){
		$url = 'edit_agent';
	}
	else{
		$url = 'addAgent';
	}
}
else $url = 'addAgent';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-male"></i> Agent Management
        <small>Add / Edit Agent</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Agent Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="add_agent" action="<?php echo base_url().$url?>" method="post" role="form">
                    <?php if(isset($agentInfo)){?>
						<input type="hidden" name="id" id="id" value="<?php echo $agentInfo->id?>">
					<?php }?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Agent Name</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($agentInfo->name))?$agentInfo->name:''?>" id="name" name="name" maxlength="128">
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Address</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($agentInfo->address))?$agentInfo->address:''?>" id="address" name="address" maxlength="128">
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">CNIC</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($agentInfo->cnic))?$agentInfo->cnic:''?>" id="cnic" name="cnic" maxlength="128">
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Email-ID</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($agentInfo->email_id))?$agentInfo->email_id:''?>" id="email_id" name="email_id" maxlength="128">
                                    </div>                                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Agrement</label>
                                        <?php if(isset($agentInfo->agrement)){
											$agrement = $agentInfo->agrement;
										}
										else{
											$agrement = '';
										}?>
                                        <select name="agrement" id="agrement" class="form-control">
                                        	<option value="">Select Agrement</option>
                                            <option value="yes"<?php echo ($agrement == 'yes')?'selected="selected"':'';?>>Yes</option>
                                            <option value="no"<?php echo ($agrement == 'no')?'selected="selected"':'';?>>No</option>
                                        </select>
                                    </div>                                    
                                </div>                                
                            </div>
                                                        
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <a href="<?php echo base_url()?>agent" class="btn btn-danger">Cancel</a>
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