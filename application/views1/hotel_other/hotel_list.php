<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-building"></i> Hotel Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>add_hotel"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <!--<div class="row">
        <form action="<?php echo base_url() ?>hotel" method="POST" id="">
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
            	<input type="submit" name="submit" value="Search" class="btn btn-primary searchList">
            </div>
            </form>
        </div>-->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hotel List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>hotel" method="POST" id="searchList">
                            
                              <!--<div class="input-group-btn">
                                <button class=" "><i class="fa fa-search"></i></button>
                              </div>-->
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-bordered table-striped dataTable table-hover">
                    <tr>
                      <th>Name</th>
                      <!--<th>Agent</th>-->
                      <th>Room Type</th>
                      <!--<th>Rate</th>-->
                      <th>City Name</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php //print_r($hotelRecords);
                    if(!empty($hotelRecords))
                    {
                        foreach($hotelRecords as $record)
                        {
							/*if($record->room_type == 'sharing')
							$amount = $record->room_amount;
							else if($record->room_type == 'single_bed')
							$amount = $record->room_amount;
							else if($record->room_type == 'double_bed')
							$amount = $record->room_amount*2;
							else if($record->room_type == 'triple_bed')
							$amount = $record->room_amount*3;
							else if($record->room_type == 'quad_bed')
							$amount = $record->room_amount*4;*/
                    ?>
                    <tr>
                      <td><?php echo $record->name ?></td>
                      <!--<td><?php echo $record->agent_name ?></td>-->
                      <td><?php echo $record->room_type ?></td>
                      <!--<td><strong><?php echo round($amount).' SR' ?></strong></td>-->
                      <td><?php echo $record->city_name ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'edit_hotel/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteHotel" href="#" data-id="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "hotel/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
