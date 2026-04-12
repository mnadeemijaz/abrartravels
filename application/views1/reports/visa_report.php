<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-building"></i> Visa Report
        <small>View</small>
      </h1>
    </section>
    <section class="content">
       	<div class="row">
        	<form action="<?php echo base_url() ?>visa_report" method="POST" id="">
            	<div class="col-md-2">
            	Shirka:
            	<select name="company_id" class="form-control">
                	<option value="">Shirka</option>
                    <?php foreach($visaCompany as $vc){?>                    
                    <option value="<?php echo $vc->id?>" <?php echo ($company_id == $vc->id)?'selected="selected"':''?>><?php echo $vc->name?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-md-2">
            	Status:
            	<select name="status" class="form-control">
                	<option value="">Select Status</option>
                    <option value="yes" <?php echo ($status == 'yes')?'selected="selected"':''?>>Approve</option>
                    <option value="no" <?php echo ($status == 'no')?'selected="selected"':''?>>Not Approve</option>
                </select>
            </div>
                <div class="col-md-1">
                	<input type="submit" name="submit" class="btn btn-primary" value="Search">
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Visa Report </h3>
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
                    <a href='<?php echo base_url() ?>visa_report_excel'> <i class="fa fa-file-excel-o "> </i> </a>
                        <a href='<?php echo base_url() ?>visa_report_word'> <i class="fa fa-file-word-o "> </i> </a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>  
                      <th>Sr#</th>                  
                      <th>Status</th>
                      <th>Name</th>
                      <th>PPNO</th>
                      <th>DOB</th>
                      <th>Visa No</th>
                      <th>Issue Date</th>
                      <th>Shirka</th>
                      <th>Party</th>                      
                    </tr>
                    <?php $counter = 1;//print_r($hotelRecords);
                    if(!empty($visa_report))
                    {
                        foreach($visa_report as $record)
                        {							
                    ?>
                    <tr>                      
                      <td><?php echo $counter++; ?></td>	
                      <td><?php echo ($record->visa_approve == 'yes')?'Approved':'Not Approved' ?></td>	
                      <td><?php echo $record->name.' '.$record->last_name ?></td>
                      <td><?php echo $record->ppno ?></td>
                      <td><?php echo date_change_view($record->dob) ?></td>
                      <td><?php echo $record->visa_no ?></td>
                      <td><?php echo date_change_view($record->visa_date) ?></td>
                      <td><?php echo $record->com_name ?></td>
                      <td><?php echo $record->agent_name ?></td>                      
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
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
            jQuery("#searchList").attr("action", baseURL + "visa_report/" + value);
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
