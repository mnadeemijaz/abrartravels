<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-building"></i>Agent's Hotel Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">        
        <div class="row">
        <form action="<?php echo base_url() ?>add_hotel_agent" method="POST" id="searchList">
        	<div class="col-md-2">
            	Party:
            	<select name="agent_id" class="form-control">
                	<option value="">Select Agent</option>
                    <?php foreach($agent as $ag){?>                    
                    <option value="<?php echo $ag->userId?>" <?php echo ($agent_id == $ag->userId)?'selected="selected"':''?>><?php echo $ag->name?></option>
                    <?php }?>
                </select>                
            </div>
            <div class="col-md-1">
            &nbsp;
            	<input type="submit" name="submit" value="Search" class="btn btn-primary">
            </div>
            </form>
        </div>
        <?php if(!empty($result)){ ?>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Select Agent Hotel</h3>
                </div><!-- /.box-header -->
                <form name="set_agent" action="<?php echo base_url()?>add_hotel_agent" method="post">
                <input type="hidden" name="agent_id" value="<?php echo $agent_id?>">
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                      <th><input type="checkbox" name="checkAll" id="checkAll"  class="checkall"> Select All</th>
                      <th>Name</th>                      
                      <th>Room Type</th>
                      <th>City Name</th>
                      <th>Rate</th>                      
                    </tr>
                    <?php //print_r($hotelRecords);
                    if(!empty($result))
                    {
                        foreach($result as $record)
                        {							
                    ?>
                    <tr>
                      <td><input onclick="checkc()" <?php echo ($record->agent)?'checked="checked"':''?> class="check_disable" id="idd_<?php echo $record->id?>" type="checkbox" name="id[<?php echo $record->id ?>]" /></td>
                      <td><?php echo $record->name ?></td>
                      <td><?php echo $record->room_type ?></td>
                      <td><?php echo $record->city_name ?></td>
                      <td><input type="text" required="required" id="price_<?php echo $record->id ?>" name="price[<?php echo $record->id ?>]" class="form-control" value="<?php echo $record->price ?>"></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <input name="submit_agent" type="submit" value="Submit" class="btn btn-primary">
                </form>
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
        <?php }?>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
		checkc();
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "hotel/" + value);
            jQuery("#searchList").submit();
        });
    });
	$("#checkAll").click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
		checkc();
	});

function checkc(){	//alert('adf');
	$(".check_disable").each(function(index, element) {
		var id_attre = $(this).attr("id");
		 var get_idd = id_attre.split('_');
		 var this_id = get_idd[get_idd.length-1];
		//alert(this_id);
		 if($(element).is(":checked"))
		 {			
			$("#price_"+this_id).prop('disabled', false);
		 }
		 else{
			 $("#price_"+this_id).prop('disabled', true);
		 }
	});
}
//	onclick="document.getElementById('price_<?php echo $record->id ?>').disabled=this.checked;" 
</script>
