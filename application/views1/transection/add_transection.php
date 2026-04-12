<?php 
if(isset($transectionInfo)){
	if($transectionInfo->id){
		$url = 'edit_transection';
	}
	else{
		$url = 'addTransection';
	}
}
else $url = 'addTransection';
//echo $transectionInfo->account_id; die();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-creit-card"></i> Transection Management
        <small>Add / Edit Transection</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Transection Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="add_client" action="<?php echo base_url().$url?>" method="post" role="form">
                    <?php if(isset($transectionInfo)){?>
						<input type="hidden" id="id" name="id" value="<?php echo $transectionInfo->id?>">
					<?php }?>
                        <div class="box-body">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Agent Name</label>
                                        <select name="agent_id" id="agent_id" class="form-control">
                                        	<option value="">Select Agent</option>
                                            <?php 
												if(isset($transectionInfo->account_id)){
													$agent = $transectionInfo->account_id;
												}
												else $agent = '';
											foreach($agentRecords as $row){
												?>
                                            <option value="<?php echo $row->userId?>"<?php echo ($agent == $row->userId)?'selected="selected"':''?>><?php echo $row->name?></option>
                                            <?php }?>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <?php 
									if(isset($transectionInfo->payment_type)){
													$payment_type = $transectionInfo->payment_type;
												}
												else $payment_type = '';
									?>
                                        <label for="email">Payment Type</label>
                                        <select name="payment_type" id="payment_type" class="form-control">
                                        	<option value="">Select Payment Type</option>
                                            <option value="dr" <?php echo ($payment_type == 'dr')?'selected="selected"':''?>>Dr</option>
                                            <option value="cr" <?php echo ($payment_type == 'cr')?'selected="selected"':''?>>Cr</option>
                                        </select>
                                    </div>
                                </div>
                            	<div class="col-md-6">
                                	<div class="form-group">
                                    	<label> Amount</label>
                                    	<input type="text" id="amount" class="form-control" value="<?php echo (isset($transectionInfo->amount))?$transectionInfo->amount:''?>" name="amount">
                                    </div>
                                </div>                                
                            	<div class="col-md-6">
                                	<div class="form-group">
                                	    <label>Date</label>
                                    	<input type="text" id="date" class="form-control" name="date" value="<?php echo (isset($transectionInfo->date))?date_change_view($transectionInfo->date):''?>">
                                    </div>
                                </div>
                                <div class="col-md-6 demo">
                                	<div class="form-group">
                                    	<label>Detail</label>
                                    	<input type="text" id="detail" class="form-control" name="detail"  value="<?php echo (isset($transectionInfo->detail))?$transectionInfo->detail:''?>">
                                   </div>
                                </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <a href="<?php echo base_url()?>transection" class="btn btn-danger">Cancel</a>
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

//alert(datediff(parseDate(first.value), parseDate(second.value)));
</script>