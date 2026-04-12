<?php 
if(isset($ticket_sale_info)){
	if($ticket_sale_info->id){
		$url = 'edit_ticket_sale';
	}
	else{
		$url = 'addTicket_sale';
	}
}
else $url = 'addTicket_sale';
//echo $transectionInfo->account_id; die();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-creit-card"></i> Ticket Sale Management
        <small>Add / Edit Ticket Sale</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Ticket Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="ticket_sale" action="<?php echo base_url().$url?>" method="post" role="form">
                    <?php if(isset($ticket_sale_info)){?>
						<input type="hidden" id="id" name="id" value="<?php echo $ticket_sale_info->id?>">
					<?php }?>
                        <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Agent Name</label>
                                        <select name="agent_id" id="agent_id" class="form-control" required="required">
                                        	<option value="">Select Agent</option>
                                            <?php 
												if(isset($ticket_sale_info->agent_id)){
													$agent = $ticket_sale_info->agent_id;
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
                                        <label for="fname">Flight Name</label>
                                        <select name="flight_id" id="flight_id" class="form-control" required="required">
                                        	<option value="">Select Flight</option>
                                            <?php 
												if(isset($ticket_sale_info->flight_id)){
													$flight = $ticket_sale_info->flight_id;
												}
												else $flight = '';
											foreach($flights as $row){
												?>
                                            <option value="<?php echo $row->id?>"<?php echo ($flight == $row->id)?'selected="selected"':''?>><?php echo $row->name?></option>
                                            <?php }?>
                                        </select>
                                    </div>                                    
                                </div>
                            	<div class="col-md-6">
                                	<div class="form-group">
                                    	<label> Name</label>
                                    	<input type="text" required="required" id="name" class="form-control" value="<?php echo (isset($ticket_sale_info->name))?$ticket_sale_info->name:''?>" name="name">
                                    </div>
                                </div>                                
                            	<div class="col-md-6">
                                	<div class="form-group">
                                    	<label> Phone</label>
                                    	<input type="text" id="phone" class="form-control" value="<?php echo (isset($ticket_sale_info->phone))?$ticket_sale_info->phone:''?>" name="phone">
                                    </div>
                                </div>                                
                            	<div class="col-md-6">
                                	<div class="form-group">
                                	    <label>Date</label>
                                    	<input type="text" id="date" required="required" class="form-control" name="date" value="<?php echo (isset($ticket_sale_info->date))?date_change_view($ticket_sale_info->date):''?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Ticket No</label>
                                    	<input type="text" id="ticket_no" class="form-control" name="ticket_no"  value="<?php echo (isset($ticket_sale_info->ticket_no))?$ticket_sale_info->ticket_no:''?>">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>PNR</label>
                                    	<input type="text" id="pnt" class="form-control" name="pnr"  value="<?php echo (isset($ticket_sale_info->pnr))?$ticket_sale_info->pnr:''?>">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Ticket From-To</label>
                                    	<input type="text" id="ticket_from_to" class="form-control" name="ticket_from_to"  value="<?php echo (isset($ticket_sale_info->ticket_from_to))?$ticket_sale_info->ticket_from_to:''?>">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Category</label>
                                    	<input type="text" id="category" class="form-control" name="category"  value="<?php echo (isset($ticket_sale_info->category))?$ticket_sale_info->category:''?>">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Purchase Rate</label>
                                    	<input type="text" id="purchase" required="required" class="form-control" name="purchase"  value="<?php echo (isset($ticket_sale_info->purchase))?$ticket_sale_info->purchase:''?>">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Sale Rate</label>
                                    	<input type="text" id="sale" required="required" class="form-control" name="sale"  value="<?php echo (isset($ticket_sale_info->sale))?$ticket_sale_info->sale:''?>">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Paid Amount</label>
                                    	<input type="text" id="paid_amount" required="required" class="form-control" name="paid_amount"  value="<?php echo (isset($ticket_sale_info->paid_amount))?$ticket_sale_info->paid_amount:''?>">
                                   </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group">
                                    	<label>Ticket / Visa <?php echo $ticket_sale_info->ticket_visa?></label>
                                    	<input type="radio" name="ticket_visa" id="ticket_visa" value="ticket" <?php echo (($ticket_sale_info->ticket_visa) == 'ticket')?'checked="checked"':''?>> Ticket
                                    	<input type="radio" name="ticket_visa" id="ticket_visa" value="visa" <?php echo (($ticket_sale_info->ticket_visa) == 'visa')?'checked="checked"':''?>> Visa
                                   </div>
                                </div>
                                
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                            <a href="<?php echo base_url()?>ticket_sale" class="btn btn-danger">Cancel</a>
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