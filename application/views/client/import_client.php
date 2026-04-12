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
                        <h3 class="box-title">Import Client Details</h3>
                        <a href="<?php base_url()?>assets/sample_client.xlsx">download Sample</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="<?php echo base_url();?>importClient" method="post" enctype="multipart/form-data">
                        Upload excel file : 
                        <input type="file" name="uploadFile" value="" /><br><br>
                        <input type="submit" name="submit" class="btn btn-default" value="Upload" />
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