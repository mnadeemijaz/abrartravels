<?php 
if(isset($clientInfo)){
	if($clientInfo->id){
		$url = 'edit_client';
	}
	else{
		$url = 'addClient';
	}
}
else $url = 'addClient';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Client Management
        <small>Add / Edit Client</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Client Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="add_client" action="<?php echo base_url().$url?>" method="post" role="form">
                    <?php if(isset($clientInfo)){?>
						<input type="hidden" id="id" name="id" value="<?php echo $clientInfo->id?>">
					<?php }?>
                        <div class="box-body">
                            <div class="row">
                            	<div class="col-md-2">
                                    <div class="form-group">
                                        <label for="fname">Mr,Miss</label>
                                        <?php if(isset($clientInfo->sr_name)){
											$sr_name = $clientInfo->sr_name;
											}
											else{
												$sr_name = '';
											}?>
                                        <select name="sr_name" class="form-control">
                                        	<option value="">Select Here</option>
                                        	<option value="Mr" <?php echo ($sr_name == 'Mr')?'selected="selected"':''?>>Mr</option>
                                            <option value="Miss" <?php echo ($sr_name == 'Miss')?'selected="selected"':''?>>Miss</option>
                                            <option value="Mrs" <?php echo ($sr_name == 'Mrs')?'selected="selected"':''?>>Mrs</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($clientInfo->name))?$clientInfo->name:''?>" id="name" name="name" maxlength="128">
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Last Name</label>
                                        <input type="text" class="form-control required" value="<?php echo (isset($clientInfo->last_name))?$clientInfo->last_name:''?>" id="last_name"  name="last_name" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group">
                                	    <label>Date Of Birth</label>
                                    	<input type="text" id="date" class="form-control" name="date" value="<?php echo (isset($clientInfo->dob))?date_change_view($clientInfo->dob):''?>">
                                    </div>
                                </div>
                                <div class="col-md-6 demo">
                                	<div class="form-group">
                                    	<label>Age Group</label>
                                    	<input type="text" id="age_group" class="form-control" name="age_group" readonly="readonly" style="background:transparent; border:0" value="<?php echo (isset($clientInfo->age_group))?$clientInfo->age_group:''?>">
                                   </div>
                                </div>
                            </div>
                            <!--<div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Passport Issue Date</label>
                                    	<input type="text" id="passport_issue_date" class="form-control" value="<?php echo (isset($clientInfo->passport_issue_date))?date_change_view($clientInfo->passport_issue_date):''?>" name="passport_issue_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                	    <label>Passport Exp Date</label>
                                    	<input type="text" id="passport_exp_date" class="form-control" value="<?php echo (isset($clientInfo->passport_exp_date))?date_change_view($clientInfo->passport_exp_date):''?>" name="passport_exp_date">
                                    </div>
                                </div>
                            </div>-->
                            
                            <div class="row">
                            	<div class="col-md-6">
                                	<div class="form-group">
                                	    <label>Passport No</label>
                                    	<input type="text" id="ppno" class="form-control" name="ppno" value="<?php echo (isset($clientInfo->ppno))?$clientInfo->ppno:''?>">
                                    </div>
                                </div>
                                <div class="col-md-6 demo">
                                    <div class="form-group">
                                    	<div class="form-group">
                                    		<label for="password">Agent</label>
                                        	<select name="agent_id" id="agent_id" class="form-control">
                                        	<option value="">Select Agent</option>
                                            <?php 
											if(isset($clientInfo->agent_id)){
													$agent_id = $clientInfo->agent_id;
												}
												else $agent_id = '';
											foreach($agentRecords as $datarow){
												
											?>
												<option value="<?php echo $datarow->userId?>" <?php echo ($datarow->userId == $agent_id)?'selected="selected"':'';?>><?php echo $datarow->name?></option>
											<?php }?>
                                        	</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="row">
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Account Packeg</label>
                                    	<input type="text" id="account_pkg" class="form-control" name="account_pkg" value="<?php echo (isset($clientInfo->account_pkg))?$clientInfo->account_pkg:''?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Documentationa Fee</label>
                                        <?php /* 
											if(isset($clientInfo->document)){
												 $document = ($clientInfo->document == 'yes')?'checked="checked"':'';
											}
											else $document = '';
										*/ ?>
                                    	<input type="checkbox" name="document" <?php echo $document?>>
                                    </div>
                                </div>                                  
                            </div>-->
                            <div class="row">
                            	<div class="col-md-6">
                                    <div class="form-group">
                                    	<div class="form-group">
                                    		<label for="password">Visa Company</label>
                                        	<select name="visa_company_id" id="visa_company_id" class="form-control" required="required">
                                        	<option value="">Select Company</option>
                                            <?php 
											if(isset($clientInfo->visa_company_id)){
													$visa_company_id = $clientInfo->visa_company_id;
												}
												else $visa_company_id = '';
											foreach($visaCompanyRecords as $datarow){
												
											?>
												<option value="<?php echo $datarow->id?>" <?php echo ($datarow->id == $visa_company_id)?'selected="selected"':'';?>><?php echo $datarow->name?></option>
											<?php }?>
                                        	</select>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-md-6">
                                    <div class="form-group">
                                    	<div class="form-group">
                                    		<label for="password">Group Code </label>
                                        	<input type="text" id="group_code" class="form-control" name="group_code" value="<?php echo (isset($clientInfo->group_code))?$clientInfo->group_code:''?>">
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                            <!--<div class="row">
                            	<div class="col-md-6">
                                    <div class="form-group">
                                    	<div class="form-group">
                                    		<label for="password">Group Name </label>
                                        	<input type="text" id="group_name" class="form-control" name="group_name" value="<?php echo (isset($clientInfo->group_name))?$clientInfo->group_name:''?>">
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <a href="<?php echo base_url()?>client" class="btn btn-danger">Cancel</a>
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

<script>
function parseDate(str) {
    var mdy = str.split('/');
	//var dd = mdy[2]+'-'+mdy[0]-1+'-'+mdy[1];
    return mdy[2]+'-'+mdy[1]+'-'+mdy[0];
}

function datediff(first, second) {    
    return Math.round((second-first)/(1000*60*60*24));
}
$('#date').change(function (){
	var dob = $('#date').val();
	var newdob = parseDate(dob);	
	var today = moment().format('YYYY-MM-DD');
	//alert (toda1y);
	var start = moment(newdob);
	var end = moment(today);
	var days = end.diff(start, "days");
	if(days<730){
		$('#age_group').val('Infant')
	}
	else if (days<3650 && days > 730){
		$('#age_group').val('Child')
	}
	else {
		$('#age_group').val('Adult')
	}
//	1
});

//alert(datediff(parseDate(first.value), parseDate(second.value)));
</script>