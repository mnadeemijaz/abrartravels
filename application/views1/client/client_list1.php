<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-building"></i> Client Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                <?php if($role == '1' || $role == '2'){?>
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addClient"><i class="fa fa-plus"></i> Add New</a>
                    <?php }?>
                </div>
            </div>
        </div>
        
        <div class="row">
        	<form action="<?php echo base_url() ?>client" method="POST" id="">
            	<div class="col-md-2">
                	<select name="age_group" class="form-control" id="age_group">
                    	<option value="">Select Age Group</option>
                        <option value="Adult" <?php echo ($age_group == 'Adult')?'selected="selected"':''?>>Adult</option>
                        <option value="Child" <?php echo ($age_group == 'Child')?'selected="selected"':''?>>Child</option>
                        <option value="Infant" <?php echo ($age_group == 'Infant')?'selected="selected"':''?>>Infant</option>
                    </select>
                </div>
                <div class="col-md-2">
                	<select name="visa_approve" class="form-control" id="visa_approve">
                    	<option value="">Select Visa Status</option>
                        <option value="yes" <?php echo ($visa_approve == 'yes')?'selected="selected"':''?>>Approved</option>
                        <option value="no" <?php echo ($visa_approve == 'no')?'selected="selected"':''?>>Not Approved</option>
                    </select>
                </div>
                <div class="col-md-2">
                	<select name="agent_id" class="form-control" id="agent_id">
                    	<option value="">Select Agent</option>
						<?php 
                        if(isset($agent_id->agent_id)){
                                $agent_id = $agent_id->agent_id;
                            }
                            else $agent_id = '';
                        foreach($agentRecords as $datarow){
                            
                        ?>
                            <option value="<?php echo $datarow->userId?>" <?php echo ($datarow->userId == $agent_id)?'selected="selected"':'';?>><?php echo $datarow->name?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-1">
                	<input type="submit" name="submit" class="btn btn-primary " value="Search">
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Client List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>client" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                    <a href='<?php echo base_url() ?>client_excel'> <i class="fa fa-file-excel-o "> </i> </a>
					<a href='<?php echo base_url() ?>client_word'> <i class="fa fa-file-word-o "> </i> </a>
                </div><!-- /.box-header -->
                <?php if(!empty($clientRecords))
                    {?>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                    	<th>Sr#</th>
                    <?php if($role == '1' || $role == '2'){?>
                      <th>Visa Approve</th>
                      <?php }else{?>
                      <th>Edit</th>
                      <?php }?>
                      <th>Mr,Miss</th>
                      <th>Name</th>
                      <th>PP Issue Date</th>
                      <th>PP Exp. Date</th>
                      <th>DOB</th>
                      <th>PPNo</th>
                      <th>Age Group</th>
                      <th>Agent Name</th>
                      <th>Account PKG</th>
                      <?php if($role == '1' || $role == '2'){?>
                      <th class="text-center">Actions</th>
                      <?php }?>
                    </tr>
                    <?php $count = 1;//print_r($hotelRecords);
                    if(!empty($clientRecords))
                    {
                        foreach($clientRecords as $record)
                        {
							if($record->voucher_issue == 'no'){
                    ?>
                    <tr>
                    <td><?php echo $count++ ?></td>
                      <td>
                      		<?php if($role == '1' || $role == '2'){?>                      						  
					<?php 	  	if($record->visa_approve == 'no'){?>
                          <a class="label label-success visaApprove" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-check"></i>Approve</a>
                          <?php } else{?>
                          <a class="label label-danger visaNApprove" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-times"></i>Dis Approve</a>
                          <?php }
						  }else{?>
                          <button type="button" class="btn-info" data-id="<?php echo $record->id?>" data-toggle="modal" data-target="#myModal">Edit</button>
                          <?php }?>
                      </td>
                      <td><?php echo $record->sr_name ?></td>
                      <td><?php echo $record->name.' '.$record->last_name ?></td>
                      <td><?php echo date_change_view($record->passport_issue_date) ?></td>
                      <td><?php echo date_change_view($record->passport_exp_date) ?></td>
                      <td><?php echo date_change_view($record->dob) ?></td>
                      <td><?php echo $record->ppno ?></td>
                      <td><?php echo $record->age_group ?></td>
                      <td><?php echo $record->agent_name ?></td>
                      <td><?php echo $record->account_pkg ?></td>
                      <?php if($role == '1' || $role == '2'){?>     
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editClient/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteClient" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                     <?php } ?> 
                    </tr>
                    <?php }
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <?php }?>
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>


<!---Model--->

<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog" style="width:50%">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Add Spouse</h4>
    </div>
    <div class="modal-body">
      <div class="row">
      	<form name="client_form" id="client_form" method="post">
			<table class="table table-hover">
                    <tr>
                      <th>Visa No</th>
                      <th>Date</th>                                          
                    </tr>
                    
                    ?>
                    <tr>
                      <td><input type="text" class="form-control" name="visa_no" value=""></td>
                      <td><input type="text" class="form-control date1" name="visa_date" value=""></td>
                      <td><input type="hidden" name="id" value="" id="id"></td>
                    </tr>
                  </table>
                  <input type="button" name="submit2" value="submit" class="btn btn-primary" onclick="client_from_submit()" data-dismiss="modal">
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div>

<!-----end model ---->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "client/" + value);
            jQuery("#searchList").submit();
        });
    });
	
$('#vv').on('shown', function () {
    var id = $(this).attr('id');
    alert (id);
});
$(document).ready(function(){
    $('#myModal').on('shown.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
		$("#id").val(id);
        //alert(id);
     });
});	
function client_from_submit() {		
	$.ajax({
		type:'POST',
		data : $('#client_form').serialize(),
		url: '<?php echo base_url();?>update_visa/',
		success: function(response)
		{
			//jQuery('#pax_detail').html(response);
			window.location.reload();
		}
	});
}

</script>
